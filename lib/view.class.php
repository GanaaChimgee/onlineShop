<?php
class View
{
    protected $data;
    protected $file;

    public function __construct($data, $file)
    {
        $this->data = $data;
        $this->file = VIEWS_PATH . $file;
    }



    public function render()
    {
        // Броуезер руу гаргалгүй буффер руу түр гаргах горимыг нээнэ.
        ob_start();
        // Контроллероос ирсэн өгөгдлийг html рүү $data массиваар дамжуулна
        $data = $this->data;

        // Контроллероос дамжуулсан html файлыг render хийнэ
        require $this->file;



        // Энэ html файлын буфферт орж ирсэн контентийг $content хувьсагчид хийе
        $content = ob_get_clean();

        // header, footer бүхий template html-ийг нь render хийнэ
        $data['site_html_content'] = $content;

        $route = App::getRouter()->getRoute();


        //'views' . DS . $route = default.php
        require ROOT . DS . 'views' . DS . $route . '.php';
    }
}
