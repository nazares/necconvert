<?php

namespace application\core;

abstract class Controller
{
    // public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $model = 'application\models\\' . ucfirst($name);
        if (class_exists($model)) {
            return new $model();
        }
    }
}
