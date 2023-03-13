<?php
class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    /**
     * If the action is login, call the login function, if the action is register, call the register
     * function, if the action is logout, call the logout function
     * 
     * @return Nothing.
     */
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

    /* Checking if the user is logged in. */
    public function login()
    {
        if (!empty($_POST)) {
            $email = @(string) ($_POST['email'] ?? '');
            $password = @(string) ($_POST['password'] ?? '');

            if (!empty($email) && !empty($password)) {
                $loginOk = $this->model->handleLogin($email, $password);


                /* Checking if the login is ok, if it is, it sets the cart to an empty array 
and redirects to the home
page, if it is not, it sets a message and redirects to the login page. */

                if ($loginOk) {
                    Session::set('cart', []);
                    header("Location: /");
                } else {
                    Session::setMessage("wrong password or email");
                    header("Location: /login");
                }
                return;
            }

            /* Checking if the email and password are empty, if they are, it sets a message and
            redirects to the login page, if they are not, it does nothing. */
            Session::setMessage("password or email is empty");
            header("Location: /login");
        } else {
            var_dump("_POST not found");
        }
    }

    /**
     * @return Nothing.
     */
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

    /**
     * It destroys the session and redirects the user to the home page.
     * s
     */
    public function logout()
    {
        Session::destroy();
        header("Location: /");
    }
}
