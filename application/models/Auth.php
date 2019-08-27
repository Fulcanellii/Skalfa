<?php

namespace application\models;

use application\core\Model;

class Auth extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $params = [
            'login' => $post['login'],
            'password' => md5($post['password']),
        ];
        $isExist = $this->db->column('SELECT id FROM user WHERE login = :login AND password = :password', $params);
        if (!$isExist) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

}