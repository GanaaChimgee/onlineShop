<?php
class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function admin_login()
    {
        // Логин товчийг дарсан эсэх
        if ($_POST && isset($_POST['login'])) {
            // Хэрэглэгчийн нэрээр базаас шүүж авна.
            $user = $this->model->getByLogin($_POST['login']);

            // Хэрэглэгч олдсон эсэх
            if (sizeof($user) > 0) {
                $userHashedPassword = $user[0]['password'];
                $userTypedPassword = $_POST['password'];
                if ($userHashedPassword == md5(Config::get("salt") . $userTypedPassword)) {
                    // Нууц үгийн хэшүүд хоорондоо таарч байгаа тул логин хийж болно.

                    // Session руу логин хийсэн хүний мэдээллийг хадгална.
                    Session::set('login', $_POST['login']);
                    Session::set('role', $user[0]['role']);

                    // Админ хуудас руу үсэрнэ
                    Router::redirect("/" . App::getRouter()->getLanguage() . "/admin/pages");
                } else {
                    Session::setMessage("Логин нэр юмуу нууц үг буруу байна!");
                }
            } else {
                Session::setMessage("Логин нэр юмуу нууц үг буруу байна!");
            }
        }

        return (new View(['site_title' => $this->params[0] . ' блог',
        ], 'users' . DS . 'admin_login.html'))->render();
    }

    // Админ Logout хийх функц
    public function admin_logout()
    {
        Session::destroy();
        // Логин хуудас руу үсэргэнэ
        Router::redirect("/" . App::getRouter()->getLanguage() . "/admin/users/login");
    }
}