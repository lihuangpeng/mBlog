<?php

if (!function_exists('getSign')) {
    function getSign($params, $sign_key)
    {
        unset($params['sign']);
        ksort($params);
        $call = function ($params) use (&$call) {
            $str = '';
            foreach ($params as $key => $item) {
                if (is_array($item)) {
                    $str .= $call($item);
                } else {
                    $str .= $key . '=' . $item . '&';
                }
            }
            return $str;
        };
        return md5($call($params) . $sign_key);

    }
}

if (!function_exists('getHash')) {
    function getHash($str, $num = 10)
    {
        $len = mb_strlen($str);
        $sum = 0;
        for ($i = 0; $i < $len; $i++) {
            $sum += (ord($str[$i]) * 31) % $num;
        }
        $sum = $sum % $num;
        return $sum;
    }
}