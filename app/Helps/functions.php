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

if (!function_exists('bindParams')) {
    function bindParams(\ReflectionMethod $method, $vars = [])
    {
        $params = $method->getParameters();
        $i_vars = array_values($vars);
        $args = [];
        foreach ($params as $key => $param) {
            $name = $param->getName();
            if ($param->getClass()) {
                $var = isset($vars[$name]) ? $vars[$name] : (isset($i_vars[$key]) ? $i_vars[$key] : []);
                $args[] = invokeClass($param->getClass(), $var);
            } else if (isset($i_vars[$key])) {
                $args[] = $i_vars[$key];
            } else if (isset($vars[$name])) {
                $args[] = $i_vars[$name];
            } else if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();
            } else {
                throw new RuntimeException('param ' . $name . ' not exists');
            }
        }
        return $args;
    }
}

if (!function_exists('invokeClass')) {
    function invokeClass($class, $vars = [])
    {
        if (!class_exists($class)) {
            throw new RuntimeException($class . ' not exists');
        }
        $reflect_class = new ReflectionClass($class);
        $constructor = $reflect_class->getConstructor();
        $args = bindParams($constructor, $vars);
        return $reflect_class->newInstanceArgs($args);
    }
}

if (!function_exists('invokeMethod')) {
    function invokeMethod($method,$vars = [])
    {
        if(is_array($method)){
            if(is_object($method[0])){
                $object = $method[0];
            }else{
                $object = invokeClass($method[0]);
            }
            if(!isset($method[1]) || !method_exists($object,$method[1])){
                throw new RuntimeException("method ".get_class($object).'::'.$method[0].' not exists');
            }
            $reflect_method = new ReflectionMethod($object,$method[1]);
        }else{
            $object = null;
            $reflect_method = new ReflectionMethod($method);
        }
        $args = bindParams($reflect_method,$vars);
        return $reflect_method->invokeArgs($object,$args);
    }
}