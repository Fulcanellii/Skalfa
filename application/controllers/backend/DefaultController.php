<?php

namespace application\controllers\backend;

use application\core\Controller;

class DefaultController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'backend';
    }

    public function actionIndex()
    {
        $this->view->render('index');
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        $this->view->redirect(' ');
    }
}