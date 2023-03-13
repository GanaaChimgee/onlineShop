<?php
class View
{
    protected $data;
    protected $file;

    /**
     * The function takes two parameters,  and , and assigns them to the properties  and
     * .
     * 
     * @param data This is the data that you want to pass to the view.
     * @param file The file name of the view to be rendered.
     */
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
        /* Assigning the data that is passed to the view to a variable called . */
        $data = $this->data;

        // Контроллероос дамжуулсан html файлыг render хийнэ
        /* Rendering the view file that is passed to the constructor. */
        require $this->file;



        // Энэ html файлын буфферт орж ирсэн контентийг $content хувьсагчид хийе
        /* Getting the content of the view file and assigning it to a variable called . */
        $content = ob_get_clean();

        // header, footer бүхий template html-ийг нь render хийнэ
        /* Assigning the content of the view file to a variable called `site_html_content` in the
       `` array. */
        $data['site_html_content'] = $content;

        $route = App::getRouter()->getRoute();


        //'views' . DS . $route = default.php
        require ROOT . DS . 'views' . DS . $route . '.php';
    }
}
