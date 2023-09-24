<?php

namespace Config;

use App\Services\UserService;
use App\Models\UserModel;

class Services extends \CodeIgniter\Config\Services
{
    public static function user_service($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('user_service');
        }

        return new UserService(new UserModel());
    }
}
