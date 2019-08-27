<?php

namespace application\controllers\backend;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Client;

class ClientController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'backend';
    }

    public function actionIndex($page = 1, $sort = 'login', $order = "asc")
    {
        $model = new Client();
        $pagination = new Pagination($this->route, $model->getUserCount(), $model::USER_PER_PAGE);
        $list = $model->getUserList($page, $model::USER_PER_PAGE, $sort, $order);

        $order = $order == 'asc' ? 'desc' : 'asc';

        $this->view->render('index', [
            'pagination' => $pagination->get(),
            'list' => $list,
            'page' => $page,
            'sort' => $sort,
            'order' => $order,
        ]);
    }

    public function actionView($id)
    {
        $model = new Client();
        $model->findOne($id);

        $this->view->render('view', [
            'data' => $model,
        ]);
    }
}