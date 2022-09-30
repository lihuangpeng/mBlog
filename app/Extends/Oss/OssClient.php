<?php

namespace App\OSS;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Config;

/**
 * Class OssClient
 * @package Oss
 * @method
 *
 */

class OssClient
{

    protected static $_instance;

    public function __construct()
    {

    }

    /**
     * @param string $bucket
     * @return OssInterface
     */
    public function bucket($bucket = '')
    {
        if(empty($bucket)){
            $bucket = Config::get('oss.default');
        }
        if(!isset(self::$_instance[$bucket])){
            $config = Config::get('oss.'.$bucket);
            self::$_instance[$bucket] = invokeClass('\\App\\OSS\\'.ucfirst($config['driver']).'OssClient',[$config]);
        }
        return self::$_instance[$bucket];
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->bucket(),$name],$arguments);
    }
}