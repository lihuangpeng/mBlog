<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Oss\OssInterface  bucket(string $bucket = '')
 * @method static getObject(string $object,string $local_file = '')
 * @method static getSignUrl($object)
 * @method static getObjectMeta(string $object)
 * @see \App\Oss\OssInterface
 */
class OssClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'oss';
    }
}