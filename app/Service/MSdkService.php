<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class MSdkService extends UserService
{

    protected $config = [
        'app_key' => 'f0fc2b0f9707d992515936e359e8e424',
        'secret_key' => 'abcdefg123456',
    ];
    protected $access_token;

    const REQUEST_ACCESS_TOKEN_URL = 'http://ithp.top/api/user/getAccessToken';
    const REQUEST_USER_INFO_URL = 'http://ithp.top/api/user/getUserInfo';

    protected function getAccessToken($code)
    {
        if (!$this->access_token) {
            $sign = getSign(['code' => $code, 'app_key' => $this->config['app_key']], $this->config['secret_key']);
            $response = Http::asForm()->post(self::REQUEST_ACCESS_TOKEN_URL, [
                'app_key' => $this->config['app_key'],
                'sign' => $sign,
                'code' => $code
            ]);
            $ret = $response->json();
            if ($ret['code'] !== 200) {
                throw new \RuntimeException('access_token获取失败,' . $ret['msg'],400);
            }
            $this->access_token = $ret['data']['access_token'];
        }
        return $this->access_token;
    }

    protected function getUserInfo($code)
    {
        $this->getAccessToken($code);
        $sign = getSign(['access_token' => $this->access_token, 'app_key' => $this->config['app_key']], $this->config['secret_key']);
        $response = Http::asForm()->post(self::REQUEST_USER_INFO_URL, [
            'access_token' => $this->access_token,
            'sign' => $sign,
            'app_key' => $this->config['app_key'],
        ]);
        $ret = $response->json();
        if ($ret['code'] !== 200) {
            throw new \RuntimeException('用户登录失败,' . $ret['msg'],400);
        }
        return $ret['data'];

    }

    public function login($params)
    {
        try{
            $user_info = $this->getUserInfo($params['code']);
            $params['client_ip'] = request()->getClientIp();
            $params = array_merge($params,$user_info);
            $user_model = new User();
            $user_model = $user_model->setTable('user_info_'.getHash($user_info['uid']))->newQuery()->where('uid',$user_info['uid'])->first();
            if($user_model){
                $ret = $this->loginAfter($user_model,$params);
            }else{
                $ret = $this->insertRegisterInfo($params);
            }
            if($ret){
                $jwtObject = JwtService::getInstance()->setSecretKey(env('APP_KEY'))->publish();
                $jwtObject->setAud($user_info['uid']);
                $jwtObject->setExpire(time() + 86400);
                $token = $jwtObject->__toString();
                return $this->returnJson(200,'登录成功',['token' => $token,'header_img' => $user_info['header_img'],'login_type' => $user_info['login_type'],'plat_user_name' =>  $user_info['plat_user_name']]);
            }
            return $this->returnJson(400,'用户登录失败');
        }catch (\Throwable $throwable){
            var_dump($throwable->getMessage());
            return $this->returnJson(500,$throwable->getMessage(),$throwable->getTraceAsString());
        }
    }
}