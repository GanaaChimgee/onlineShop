<?php
class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Product();
    }

    // Бүх вэб хуудасны жагсаалтыг үзүүлэх
    public function index()
    {
        // Базаас бүх вэбүүдийг уншиж авна
        $products = $this->model->getList();

        return (new View([
            'site_title' => $this->params[0] . ' Програмчлалын блог',
            'products' => $products,
        ], 'pages' . DS . 'index.php'))->render();
    }
}
