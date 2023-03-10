<?php
class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function index()
    {
        if (!Session::hasMessage()) Session::setMessage("please give the right password...");
        return (new View(['site_title' => $this->params[0] ?? null], 'login' . DS . 'index.html'))->render();
    }
}
