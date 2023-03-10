<?php
class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function index()
    {
        if ($_REQUEST['action'] == 'login') {
            $this->login();
            return;
        } else if ($_REQUEST['action'] == 'register') {
            $this->register();
            return;
        } else if ($_REQUEST['action'] == 'logout') {
            $this->logout();
            return;
        }
    }

    public function login()
    {
        if (!empty($_POST)) {
            $email = @(string) ($_POST['email'] ?? '');
            $password = @(string) ($_POST['password'] ?? '');

            if (!empty($email) && !empty($password)) {
                $loginOk = $this->model->handleLogin($email, $password);


                if ($loginOk) {
                    Session::set('cart', []);
                    header("Location: /");
                } else {
                    Session::setMessage("wrong password or email");
                    header("Location: /login");
                }
                return;
            }

            Session::setMessage("password or email is empty");
            header("Location: /login");
        } else {
            var_dump("_POST not found");
        }
    }

    public function register()
    {
        if (!empty($_POST)) {
            var_dump($_POST);
            $email = @(string) ($_POST['email'] ?? '');
            $password = @(string) ($_POST['password'] ?? '');
            $name = @(string) ($_POST['name'] ?? '');

            if (!empty($email) && !empty($password)) {
                $loginOk = $this->model->handleRegister($email, $password, $name);
                if ($loginOk) {
                    header("Location: /login");
                    return;
                }
            }
            header("Location: /register");
            return;
        } else {
            var_dump("_POST not found");
        }
    }

    public function logout()
    {
        Session::destroy();
        header("Location: /");
    }
}
