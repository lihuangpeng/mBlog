<?php

namespace App\Http\Api;

use App\Service\JwtService;
use App\Service\MSdkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function sdkLogin()
    {
        if(request()->isMethod('get')){
            $params = request()->input();
            $validator = Validator::make($params,[
                'code' => 'required'
            ]);
            $response = response('<script type="text/javascript">window.location.href ="http://ithp.top"</script>');
            if(!$validator->fails()){
                $response->cookie('msdk_code',$params['code'],0,null,null,null,false);
            }
            return $response;
        }else{
            $params = request()->input();
            $service = new MSdkService();
            $ret = $service->login($params);
            return $this->returnJson($ret['code'], $ret['msg'], $ret['data']);
        }
    }

    public function refreshToken(Request $request)
    {
        $params = $request->all();
        $validator = Validator::make($params,[
            'authorization' => 'required'
        ]);
        if($validator->fails()){
            return $this->returnJson(400,$validator->errors()->first());
        }
        $jwtObject = JwtService::getInstance()->setSecretKey(env('APP_KEY'))->decode($params['authorization']);
        $status = $jwtObject->getStatus();
        switch ($status){
            case 0:
                $publish = JwtService::getInstance()->publish();
                $publish->setAud($jwtObject->getAud());
                $publish->setExpire(time() + 86400);
                $token = $publish->__toString();
                return $this->returnJson(200,'成功',$token);
                break;
            case -2:
                return $this->returnJson(400,'token已过期');
                break;
            default:
                return $this->returnJson(400,'token异常');
                break;
        }
    }
}