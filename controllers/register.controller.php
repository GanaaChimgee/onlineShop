
<?php
class RegisterController extends Controller
{

    /**
     * The above function is a constructor function that calls the parent constructor function and
     *  then
     * creates a new instance of the User class.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    /**
     * 
     * @return A new View object with the parameters of the site title and the file path to the
     * register.html file.
     */
    public function index()
    {
        return (new View(['site_title' => $this->params[0] ?? null], 'login' . DS . 'register.html'))->render();
    }
}
