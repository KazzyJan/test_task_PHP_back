<?php
require_once __DIR__ . '/../config/Paths.php';
class Router {
    public static function route($uri) {
        $routes = [
            '/' => ['controller' => 'HomeController', 'action' => 'index'],
            '/orders' => ['controller' => 'OrderController', 'action' => 'index'],
            '/orders/add' => ['controller' => 'OrderController', 'action' => 'addOrder'],
            '/orders/(\d+)' => ['controller' => 'OrderController', 'action' => 'getOrder'],

            '/customers' => ['controller' => 'CustomerController', 'action' => 'index'],
            '/customers/(\d+)' => ['controller' => 'CustomerController', 'action' => 'getCustomer'],
        ];

        foreach ($routes as $route => $target) {
            if (preg_match("#^{$route}$#", $uri, $matches)) {
                require_once __DIR__ . "/../controllers/{$target['controller']}.php";
                $controller = new $target['controller']();
                call_user_func_array([$controller, $target['action']], array_slice($matches, 1));
                return;
            }
        }

        http_response_code(404);

        require_once PAGE_404;
        exit;
    }
}
