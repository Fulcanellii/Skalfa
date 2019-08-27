<?php

namespace application\core;

abstract class Controller
{

    public $route;

    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        if ($this->route['section'] == 'backend' && !$this->checkAuth()) {
            $this->view->redirect('auth/login');
        }
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAuth()
    {
        if ($this->route['section'] == 'backend' && isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

}