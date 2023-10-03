<?php
namespace Config;

use App\Services\UserService;
use App\Models\UserModel;

class Services extends \CodeIgniter\Config\Services
{
    public static function userService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('userService');
        }

        return new UserService(new UserModel());
    }
}
?>