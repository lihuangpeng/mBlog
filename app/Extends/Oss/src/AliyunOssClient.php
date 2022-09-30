<?php

namespace App\Service\OssClient;

class AliyunOssClient extends Driver
{
    protected $config;

    public function getObject($params)
    {
        $this->getRequestQuery('GetObject',$params);
        
    }

    protected function getRequestQuery($action, $params): String
    {
        $query = call_user_func_array([$this, 'get' . $action . 'Query'], [$params]);
        $query['SignatureNonce'] = md5(uniqid(mt_rand(10000, 99999), true));
        $query['Action'] = $action;
        $query['AccessKeyId'] = $this->config['access_key'];
        date_default_timezone_set('UTC');
        $query['Timestamp'] = date('Y-m-d\TH:i:s\Z');
        date_default_timezone_set('Asia/Shanghai');
        $signature = $this->getSignature($query, $query_str);
        return 'Signature=' . $signature . '&' . $query_str;
    }

    protected function getSignature($params, &$query_str)
    {
        unset($params['Signature']);
        ksort($params);
        $str = '';
        foreach ($params as $key => $param) {
            $str .= $this->specialUrlEncode($key) . '=' . $this->specialUrlEncode($param) . '&';
        }
        $query_str = $str = rtrim($str, '&');
        $str = 'GET&' . $this->specialUrlEncode('/') . "&" . $this->specialUrlEncode($str);
        $signature = hash_hmac('sha1', $str, $this->config['secret_key'] . '&', true);
        $signature = $this->specialUrlEncode(base64_encode($signature));
        return $signature;
    }

    protected function specialUrlEncode(String $value): String
    {
        return str_replace("%7E", "~", str_replace('*', '%2A', str_replace('+', "%20", urlencode($value))));
    }

    protected function getGetObjectQuery($sms_info)
    {
        return [
            'PhoneNumbers' => $sms_info['phone'],
            'SignName' => $sms_info['sign_name'],
            'TemplateCode' => $sms_info['template_code'],
            'TemplateParam' => json_encode($sms_info['template_params'])
        ];
    }
}