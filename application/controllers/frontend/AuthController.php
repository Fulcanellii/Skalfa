<?php

namespace application\controllers\frontend;

use application\core\Controller;
use application\models\Auth;
use application\models\Client;

class AuthController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'auth';
    }

    public function actionLogin()
    {
        if (isset($_SESSION['user'])) {
            $this->view->redirect('backend/default/index');
        }
        if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
            $model = new Auth();
            if (!$model->loginValidate($_POST)) {
                $this->view->message('error', $model->error, ['login' => $model->error]);

            }
            $_SESSION['user'] = true;
            $this->view->redirectJs('backend/default/index');
        }
        $this->view->render('login');
    }

    public function actionReg()
    {
        $model = new Client();
        $list = $model->getCountry();
        if (!empty($_POST)) {
            $model->setAttributes($_POST);
            if ($model->save()){
                $this->view->redirectJs('frontend/auth/login');
            } else {
                $this->view->message('error', implode('<br />', $model->error), $model->error);
            }
        }
        $this->view->render('reg', [
            'list' => $list,
        ]);
    }
}