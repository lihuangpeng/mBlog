<?php

namespace Traits;

trait TraitAliyun
{
    protected function getRequestQuery($action, $params): String
    {
        $query = [];
        if (method_exists($this, 'get' . $action . 'Query')) {
            $query = call_user_func_array([$this, 'get' . $action . 'Query'], [$params]);
        }
        $query['SignatureNonce'] = md5(uniqid(mt_rand(10000, 99999), true));
        $query['Action'] = $action;
        $query['AccessKeyId'] = $this->config['accessKeyId'];
        $query['SignatureMethod'] = 'HMAC-SHA1';
        $query['SignatureVersion'] = '1.0';
        $query['Format'] = 'json';
        date_default_timezone_set('UTC');
        $query['Timestamp'] = date('Y-m-d\TH:i:s\Z');
        date_default_timezone_set('Asia/Shanghai');
        $signature = $this->getSignature($query, $query_str);
        return 'Signature=' . $signature . '&' . $query_str;
    }

    protected function getSignature($params, &$query_str, $method = 'GET')
    {
        unset($params['Signature']);
        ksort($params);
        $str = '';
        foreach ($params as $key => $param) {
            $str .= $this->specialUrlEncode($key) . '=' . $this->specialUrlEncode($param) . '&';
        }
        $query_str = $str = rtrim($str, '&');
        $str = $method . '&' . $this->specialUrlEncode('/') . "&" . $this->specialUrlEncode($str);
        $signature = hash_hmac('sha1', $str, $this->config['accessKeySecret'] . '&', true);
        $signature = $this->specialUrlEncode(base64_encode($signature));
        return $signature;
    }

    protected function specialUrlEncode(String $value): String
    {
        return str_replace("%7E", "~", str_replace('*', '%2A', str_replace('+', "%20", urlencode($value))));
    }
}