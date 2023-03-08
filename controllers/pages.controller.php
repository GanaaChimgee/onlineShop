<?php
class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Product();
    }

    // Вэб хуудсыг устгана
    // public function admin_delete()
    // {
    //     if (isset($this->params[0])) {
    //         // Устгах блогийн ID нь байна
    //         if ($this->model->delete($this->params[0])) {
    //             // Амжилттай устгасан
    //             Session::setMessage("Блогийг амжилттай устгалаа!");
    //         } else {
    //             // Устгахад алдаа гарсан
    //             Session::setMessage("Блогийг устгаж чадсангүй!");
    //         }
    //     } else {
    //         // Устгах блогийн ID нь БАЙХГҮЙ байна!
    //         Session::setMessage("Устгах блогийн ID байхгүй байна!");
    //     }

    //     // Буцаад хуудаснуудын жагсаалт руу үсэрнэ
    //     Router::redirect("/" . App::getRouter()->getLanguage() . "/admin/pages");
    // }

    // Бүх вэб хуудасны жагсаалтыг үзүүлэх
    public function index()
    {
        // Базаас бүх вэбүүдийг уншиж авна
        // TODO: Page model needs to be adapted (re-write sql queries)
        $products = $this->model->getList();
        // echo "<pre>";
        // print_r($products);
        // exit;



        return (new View([
            'site_title' => $this->params[0] . ' Програмчлалын блог',
            'products' => $products,
        ], 'pages' . DS . 'index.php'))->render();
    }



    // Бүх вэб хуудасны жагсаалтыг үзүүлэх
    // public function admin_index()
    // {
    //     // Базаас бүх вэбүүдийг уншиж авна
    //     $webs = $this->model->getList();

    //     return (new View(['site_title' => $this->params[0] . ' Програмчлалын блог',
    //         'webs' => $webs,
    //     ], 'pages' . DS . 'admin_index.html'))->render();
    // }

    // Блог хуудсыг засварлах
    // public function admin_edit()
    // {
    //     // Submit хийж хадгалсан эсэх
    //     if ($_POST) {
    //         if ($this->model->savePage($_POST, $this->params[0])) {
    //             // Амжилттай хадгалсан байна
    //             Session::setMessage("Блогийн мэдээллийг амжилттай өөрчиллөө!");
    //         } else {
    //             Session::setMessage("Блогийн мэдээллийг өөрчилж чадсангүй!!!");
    //         }
    //     }

    //     // хэрэв хадгалаагүй бол хуучин өгөгдлийг ачаална
    //     $web = $this->model->getById($this->params[0]);

    //     // Блогийг засварлах формыг үзүүлнэ
    //     return (new View(['site_title' => $this->params[0] . ' засварлах',
    //         'web' => $web[0],
    //     ], 'pages' . DS . 'admin_edit.html'))->render();
    // }

    // // Шинээр блог хуудас нэмэх
    // public function admin_add()
    // {
    //     if ($_POST) {
    //         // Формийг submit хийсэн байна. Базд хадгална.
    //         if ($this->model->addNewPage($_POST)) {
    //             Session::setMessage("Шинэ блогийг амжилттай үүсгэлээ!");
    //         } else {
    //             Session::setMessage("Шинэ блогийг үүсгэж чадсангүй!!!");
    //         }

    //         App::getRouter()->redirect("/" . App::getRouter()->getLanguage() . "/admin/pages");
    //     }

    //     // Шинэ блог үүсгэх формыг үзүүлнэ
    //     return (new View(['site_title' => $this->params[0] . ' Програмчлалын блог',
    //     ], 'pages' . DS . 'admin_add.html'))->render();
    // }

    // Ямар нэг вэб хуудсыг контентийг уншиж авч үзүүлэх
    // public function view()
    // {
    //     // Тухайн вэб хуудасны мэдээллийг базаас ачаална
    //     $web = $this->model->getByAlias($this->params[0]);

    //     return (new View(['site_title' => $this->params[0] . ' хуудас',
    //         'web' => $web[0],
    //     ], 'pages' . DS . 'index.html'))->render();
    // }

    // public function admin_view()
    // {
    //     // Тухайн вэб хуудасны мэдээллийг базаас ачаална
    //     $web = $this->model->getByAlias($this->params[0]);

    //     return (new View(['site_title' => $this->params[0] . ' хуудас',
    //         'web' => $web[0],
    //     ], 'pages' . DS . 'admin_view.html'))->render();
    // }
}
