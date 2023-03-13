
<?php
/* The PagesController class extends the Controller class and has a constructor that calls the parent
constructor. 
The PagesController class has an index method that calls the getList method of the Product model and
passes the result to the index view. */
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

        $products = $this->model->getList();
        /* Creating a new View object and passing it an array of data and a path to the view file. */

        return (new View([
            'site_title' => $this->params[0],
            'products' => $products,
        ], 'pages' . DS . 'index.php'))->render();
    }
}
