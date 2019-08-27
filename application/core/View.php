<?php

namespace application\core;

class View
{

    public $path;

    public $route;

    public $layout = 'frontend';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['section'] . '/' . $route['controller'] . '/' . $route['action'];
    }

    public function render($path = '', $vars = [])
    {
        if ($path == '') $path = $this->path;

        extract($vars);
        $template = 'application/views/' . $this->route['section'] . '/' . $this->route['controller'] . '/' . $path . '.php';
        if (file_exists($template)) {
            ob_start();
            require $template;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }
    }

    public static function redirect($url)
    {
        header('location: /' . $url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message, $fields = [])
    {
        exit(json_encode(['status' => $status, 'message' => $message, 'fields' => $fields]));
    }

    public function redirectJs($url)
    {
        exit(json_encode(['url' => $url]));
    }
}