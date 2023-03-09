<?php
class OrdersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Order();
    }

    // Бүх вэб хуудасны жагсаалтыг үзүүлэх
    public function index()
    {
        var_dump($_REQUEST);
        if (!array_key_exists('action', $_REQUEST)) {
            $this->listAllOrders();
            return;
        }

        if ($_REQUEST['action'] == 'add_to_cart') {
            $this->addProductToCart();
            return;
        }

        if ($_REQUEST['action'] == 'order_confirm') {
            $this->confirmOrder();
            return;
        }

        if ($_REQUEST['action'] == 'order_delete') {
            $this->deleteOrder($_REQUEST['order']);
            return;
        }
    }

    public function confirm()
    {
        return (new View([
            'site_title' => 'Orders' . ' Програмчлалын блог',
            null,
        ], 'orders' . DS . 'confirm.php'))->render();
    }

    public function success()
    {
        return (new View([
            'site_title' => 'Orders' . ' Програмчлалын блог',
            null,
        ], 'orders' . DS . 'success.php'))->render();
    }

    public function listAllOrders()
    {
        $orders = $this->model->getList();

        return (new View([
            'site_title' => 'Orders' . ' Програмчлалын блог',
            'orders' => $orders,
        ], 'orders' . DS . 'index.php'))->render();
    }

    public function addProductToCart()
    {
        $productId = $_REQUEST['product'];
        $currentCart = Session::get('cart');

        if (!in_array($productId, $currentCart)) {
            array_push($currentCart, $productId);
            Session::set('cart', $currentCart);
        }

        header('Location: /');
    }

    public function confirmOrder()
    {
        $this->model->confirm($_REQUEST['note']);
        Session::set('cart', []);
        header('Location: /orders/success');
    }

    public function deleteOrder($orderId)
    {
        $this->model->delete($orderId);
        header('Location: /orders');
    }
}
