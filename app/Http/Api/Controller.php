<?php

namespace App\Http\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Sts\AliyunStsClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function returnJson($code, $msg, $data = [])
    {
        $return = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return response(json_encode($return))->withHeaders([
            'Content-Type' => 'application/json;charset=utf-8'
        ]);
    }

    public function getAssumeRole()
    {
        $data = (new AliyunStsClient)->getAssumeRole();
        if (!empty($data['Credentials']['AccessKeyId']) && !empty($data['Credentials']['AccessKeySecret'])) {
            return $this->returnJson(200, 'success', $data['Credentials']);
        } else {
            return $this->returnJson(1, $data['Message']);
        }
    }
}
