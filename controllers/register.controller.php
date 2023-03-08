<?php
class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function index()
    {
        return (new View(['site_title' => $this->params[0] ?? null], 'login' . DS . 'register.html'))->render();
    }
}
