<?php
class App
{
    /**
     * router: ....
     */
    protected static $router;
    public static $db;


    public function run($uri)
    {
        self::$router = new Router($uri);

        // Өгөгдлийн сангийн утилитийг ачаалах
        self::$db = new Db(Config::get('db.host'), Config::get('db.database'), Config::get('db.user'), Config::get('db.password'));

        // Хэлний мэдээллийг ачаалах
        Lang::load(self::$router->getLanguage());

        // Дуудагдах ёстой контроллер классын нэрийг угсрах
        $controller = ucfirst(self::$router->getController()) . 'Controller';
        // Уг контроллер дотроос дуудагдах функцийн нэрийг олох
        $action = self::$router->getMethodPrefix() . self::$router->getAction();

        // Контроллерийн функцийг нь дуудах

        $obj = new $controller();
        if (method_exists($controller, $action)) {
            echo $obj->$action();
        } else {
            echo "$controller классын $action method байхгүй байна.";
        }
    }

    /**
     * @returns a route
     */
    public static function getRouter()
    {
        return self::$router;
    }
}
