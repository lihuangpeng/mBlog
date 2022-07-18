<?php

namespace App\Service;

class BaseService
{
    public function returnJson($code,$msg,$data = [])
    {
        $return = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return $return;
    }
}