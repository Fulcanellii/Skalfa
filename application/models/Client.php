<?php

namespace application\models;

use application\core\Model;
use application\core\View;
use application\lib\Helper;

class Client extends Model
{
    public $error = [];

    const USER_PER_PAGE = 10;

    public $id;
    
    public $login;

    public $password;

    public $email;

    public $country;

    public $img;

    public $dirtyLogin;
    public $dirtyPassword;

    public function validateUser()
    {
        if ($this->login != $this->dirtyLogin && $this->db->exists('user', 'login', $this->login)) {
            $this->error['login'] = 'Такой логин уже существует';
        } else if (mb_strlen($this->login) < 3 || mb_strlen($this->login) > 25) {
            $this->error['login'] = 'Поле «Логин» должно содержать от 3 до 25 символов';
        }

        if($this->isNewRecord() && (mb_strlen($this->password) < 6 || mb_strlen($this->password) > 64)) {
            $this->error['password'] = 'Поле «Пароль» должно содержать от 6 до 64 символов';
        } else if (!$this->isNewRecord() && ($this->password !== null && $this->password != '')) {
            if(mb_strlen($this->password) < 6 || mb_strlen($this->password) > 64) {
                $this->error['password'] = 'Поле «Пароль» должно содержать от 6 до 64 символов';
            }
        }

        if ($this->email == '') {
            $this->error['email'] = 'Поле «E-mail» не должно быть пустым';
        } else if ($this->email && $this->db->exists('user', 'email', $this->email))
            $this->error['email'] = 'Такой E-mail уже зарегистрирован';

        if (!empty($this->error)) {
            return false;
        }
        return true;
    }

    public function isNewRecord()
    {
        if ($this->id !== null && $this->db->exists('user', 'id', $this->id)) {
            return false;
        } else {
            return true;
        }

    }

    public function save()
    {
        if ($this->validateUser()) {

            $params = [
                'id' => $this->id,
                'login' => $this->login,
                'password' => $this->password == '' ? $this->dirtyPassword : md5($this->password),
                'email' => $this->email,   
                'img' => $this->file(),
                'country' => $this->country,
            ];

            if ($this->isNewRecord()) {

                $this->db->query('INSERT INTO user (id, login, password, email, img, country) VALUES (:id, :login, :password, :email, :img, :country)', $params);
                if ($this->db->lastInsertId() > 0) {
                    $this->id = $this->db->lastInsertId();
                    return true;
                }
            } else {
                $this->db->query('UPDATE user SET login = :login, password = :password, email = :email, img = :img, country = :country WHERE id = :id', $params);
                return true;
            }
        }
        return false;
    }

    public function findOne($id)
    {
        $data = $this->db->row('SELECT * FROM user WHERE id = :id LIMIT 1', ['id' => $id]);
        if (!empty($data)) {
            $this->setAttributes($data[0]);
            return true;
        }
        View::errorCode(404);

    }

    public function setAttributes($data)
    {
        $this->dirtyLogin = $this->login ?? null;
        $this->dirtyPassword = $this->password ?? null;

        $this->id = isset($data['id']) ? (int)$data['id'] : null;
        $this->login = $data['login'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->img = $data['img'] ?? null;
        $this->country = $data['country'] ?? null;

    }

    public function getUserCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM user');
    }

    public function getUserList($page = 1, $max = 10, $sort = 'login', $order = 'asc')
    {
        $page = !is_numeric($page) || $page < 0 ? 1 : $page;
        $params = [
            'max' => $max,
            'start' => ((($page ?? 1) - 1) * $max),
        ];

        return $this->db->row('SELECT * FROM user ORDER BY ' . $sort . ' ' . $order . ' LIMIT :start, :max', $params);
    }

    public function file()
    {
    	if(empty($_FILES['img']['size'])) $this->error['img'] = 'Вы не выбрали файл';

		if($_FILES['img']['size'] > (5 * 1024 * 1024)) $this->error['img'] = 'Размер файла не должен превышать 5Мб';

		$imageinfo = getimagesize($_FILES['img']['tmp_name']);

		$arr = array('image/jpeg','image/gif','image/png');

		if(!in_array($imageinfo['mime'],$arr)) $this->error['img'] = 'Картинка должна быть формата JPG, GIF или PNG';
 		else {
        $upload_dir = 'public/images/ava/'; 
        $name = $upload_dir.date('YmdHis').basename($_FILES['img']['name']);
        $mov = move_uploaded_file($_FILES['img']['tmp_name'],$name);
        if($mov) {
            $name = stripslashes(strip_tags(trim($name)));
            }
        return $name;
    }
    }	

    public function getCountry()
    {
    	return $country = require 'application/config/country.php';
    }

}