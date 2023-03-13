<?php
class App
{
    /*  */

    protected static $router;
    public static $db;


    /**
     * The run() function is the main function of the framework. It is responsible for loading the
     * router, database, language, and the controller
     * 
     * @param uri The URI of the request.
     */
    public function run($uri)
    {
        self::$router = new Router($uri);


        self::$db = new Db(Config::get('db.host'), Config::get('db.database'), Config::get('db.user'), Config::get('db.password'));


        Lang::load(self::$router->getLanguage());

        // Дуудагдах ёстой контроллер классын нэрийг угсрах
        $controller = ucfirst(self::$router->getController()) . 'Controller';
        // Уг контроллер дотроос дуудагдах функцийн нэрийг олох
        $action = self::$router->getMethodPrefix() . self::$router->getAction();

        // Контроллерийн функцийг нь дуудах

        /* Creating a new object of the controller class and then calling the method of the controller
        class. */
        $obj = new $controller();
        if (method_exists($controller, $action)) {
            echo $obj->$action();
        } else {
            echo "$controller классын $action method байхгүй байна.";
        }
    }


    /* Returning the router object. 
    * 
    */
    public static function getRouter()
    {
        return self::$router;
    }
}
