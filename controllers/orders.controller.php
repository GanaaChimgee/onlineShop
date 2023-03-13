<?php
class OrdersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Order();
    }


    /**
     * If the request has an id, show the order details. If the request has an action, do the action. If
     * the request has no action, list all orders.
     * 
     * @return The return statement is used to end execution of the current function, and returns its
     * argument as the value of the function call. If no parameter is provided, NULL will be returned.
     */
    public function index()
    {

        if (array_key_exists('id', $_REQUEST)) {
            $this->showOrderDetails();
            return;
        }

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

        if ($_REQUEST['action'] == 'order_cancel') {
            $this->cancelOrder($_REQUEST['order']);
            return;
        }

        if ($_REQUEST['action'] == 'order_edit') {
            $this->editOrder($_REQUEST['orderNote']);
            return;
        }
    }

    /**
     * A function that is used to edit an order.
     */
    public function confirm()
    {
        return (new View([
            'site_title' => 'Orders',
            null,
        ], 'orders' . DS . 'confirm.php'))->render();
    }

    public function success()
    {
        return (new View([
            'site_title' => 'Orders',
            null,
        ], 'orders' . DS . 'success.php'))->render();
    }

    public function listAllOrders()
    {
        $orders = $this->model->getList();

        return (new View([
            'site_title' => 'Orders',
            'orders' => $orders,
        ], 'orders' . DS . 'index.php'))->render();
    }

    public function showOrderDetails()
    {
        $data = $this->model->getOrder($_REQUEST['id']);

        return (new View([
            'site_title' => 'Orders',
            'order' => $data['order'],
            'products' => $data['products'],
        ], 'orders' . DS . 'details.php'))->render();
    }

    public function addProductToCart()
    {
        $productId = $_REQUEST['pId'];
        $currentCart = Session::get('cart');

        $found = false;

        foreach ($currentCart as $el) {
            if ($el['id'] == $productId) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            $product['id'] = $productId;
            $product['image'] = $_REQUEST['pImage'];
            $product['NAME'] = $_REQUEST['pName'];
            $product['color'] = $_REQUEST['pColor'];
            $product['price'] = $_REQUEST['pPrice'];

            array_push($currentCart, $product);
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
        //header — Send a raw HTTP header
        $this->model->delete($orderId);
        header('Location: /orders');
    }

    public function cancelOrder()
    {
        $this->model->confirm($_REQUEST['note']);
        Session::set('cart', []);
        header('Location: /orders/success');
    }

    public function editOrder()
    {
        $this->model->update($_REQUEST['orderNote'], $_REQUEST['orderId']);
        header('Location: /orders');
    }
}
