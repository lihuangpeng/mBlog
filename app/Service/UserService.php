<?php

namespace App\Service;

use App\Models\User as UserModel;
use App\Models\UserRegister;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{

    public function loginAfter($user_model,$params)
    {
        $now = time();
        $user_model->header_img = $params['header_img'];
        $user_model->bind_phone = $params['bind_phone'];
        $user_model->nickname = $params['plat_user_name'];
        $user_model->last_login_time = $now;
        $user_model->last_login_ip = $params['client_ip'];
        return $user_model->save();
    }

    public function insertRegisterInfo($params)
    {
        try{
            $now = time();
            $user_model = new UserModel();
            $table_name = 'user_info_'.getHash($params['uid']) ;
            $user_model->setTable($table_name);
            $user_model->nickname = $params['plat_user_name'];
            $user_model->bind_phone = $params['bind_phone'];
            $user_model->uid = $params['uid'];
            $user_model->header_img = $params['header_img'];
            $user_model->register_time = $now;
            $user_model->last_login_time = $now;
            $user_model->register_ip = $params['client_ip'];
            $user_model->last_login_ip = $params['client_ip'];
            $ret = $user_model->save();
            if ($ret) {
                return true;
            } else {
                return false;
            }
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }
}