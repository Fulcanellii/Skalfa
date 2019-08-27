<?php

namespace application\core;

class Router
{

    protected $routes = [];

    protected $params = [];

    private $defaultController = 'default';

    private $defaultAction = 'index';

    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        $routes = [];
        foreach ($arr as $key => $val) {
            foreach($val as $key1 => $val1) {
                $routes['section'] = $key;
                $routes['controller'] = $val1['controller'];
                $routes['action'] = $val1['action'];
                $this->add($key1, $routes);
            }
        }
    }

    public function add($route, $params)
    {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        $args = [];
        $query = parse_url($url);
        if(!empty($query['query'])) {
            parse_str($query['query'], $args);
        }

        if(isset($query['path']) && $query['path'] != '') {
            $rt = explode('/', $query['path']);

            if(isset($rt[0])) {
                $this->params['section'] = $rt[0];
            }
            if(isset($rt[1])) {
                $this->params['controller'] = $rt[1];
            }
            if(isset($rt[2])) {
                $this->params['action']  = $rt[2];
            }

            if(isset($rt[0]) && !isset($rt[1])) {
                $this->params['controller'] = $this->defaultController;
            }
            if(isset($rt[1]) && !isset($rt[2])) {
                $this->params['action'] = $this->defaultAction;
            }

        }

        $this->params = array_merge($this->params, $args);

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int)$match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
            }
        }
        if(!empty($this->params)) {
            return true;
        }

        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . $this->params['section'] . '\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = 'action' . ucfirst($this->params['action']);
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $args = array_filter($this->params, function($value, $key) {
                        return $key != 'action' && $key != 'section' && $key != 'controller';
                    }, ARRAY_FILTER_USE_BOTH);

                    call_user_func_array([$controller, $action], $args);

                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}