<?php
class Router
{
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $language;
    protected $method_prefix;

    public function __construct($uri)
    {
        // echo "Router URI: " . $uri;
        $this->uri = urldecode(trim($uri, '/'));
        $this->controller = Config::get('default_controller');
        // Route: default, admin
        $this->route = Config::get('default_route');
        $this->action = Config::get('default_action');
        $this->language = Config::get('default_language');
        $routes = Config::get('routes');
        $this->method_prefix = $routes[$this->route] ?? '';

        // URI parse хийх хэсэг
        $tokens = explode('?', $this->uri);
        $paths = explode('/', $tokens[0]);

        if (count($paths)) {
            // Хэлийг байгаа эсэхийг шалгах
            if (in_array(current($paths), Config::get('languages'))) {
                $this->language = current($paths);
                array_shift($paths);
            }

            // Эхний элэмент Route мөн эсэхийг шалгах
            if (in_array(current($paths), array_keys($routes))) {
                $this->route = current($paths);
                $this->method_prefix = $routes[$this->route];
                array_shift($paths);
            }

            // Контроллерийг авах
            if (current($paths)) {
                $this->controller = current(($paths));
                array_shift($paths);
            }

            // Action авах
            if (current($paths)) {
                $this->action = current(($paths));
                array_shift($paths);
            }

            // Параметрүүдийг авах
            $this->params = $paths;
        }

        // echo "<pre>";
        // print_r("Route: " . $this->getRoute() . PHP_EOL);
        // print_r("Language: " . $this->getLanguage() . PHP_EOL);
        // print_r("Controller: " . $this->getController() . PHP_EOL);
        // print_r("Action: " . $this->getMethodPrefix() . $this->getAction() . PHP_EOL);
        // echo "Params:" . PHP_EOL;
        // print_r($this->getParams());
    }

    public static function redirect($path)
    {
        header("Location: $path");
        exit;
    }

    public function getFullPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getPathWithoutLanguage()
    {
        $uri = str_replace("/mn/", "", $_SERVER['REQUEST_URI']);
        $uri = str_replace("/en/", "", $uri);
        return $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }
}
