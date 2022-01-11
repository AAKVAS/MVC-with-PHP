<?php
class Route {
    static function start () {
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        function ErrorPage404 () {
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 NOT FOUND');
            header('Status: 404 Not Found');
            header('Location:'. $host. '404');
        }

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        $model_name = 'Model_' . strtolower($controller_name) ;
        $controller_name = 'Controller_' . $controller_name;
        $action_name =  'action_' . $action_name;

            $model_file = strtolower($model_name) . '.php';
        $model_path = 'models/' . $model_file;
        if(file_exists($model_path))
        {
            include $model_path;
        }

        $controller_file = $controller_name.'.php';
        $controller_path = "controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include $controller_path;
        }
        else
        {
            ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)) {
            $controller->$action();
        }
        else {
            ErrorPage404();
        }


    }
}