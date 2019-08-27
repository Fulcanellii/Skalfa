<?php

namespace application\controllers\frontend;

use application\core\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->view->render('index');
    }

}