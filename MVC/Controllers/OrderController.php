<?php
require_once "./models/DBconnection.php";
class OrderController extends BaseController
{

    private $OrderModel;


    public function __construct()
    {
        $this->load('OrderModel');
        $this->load('order');
        $this->OrderModel = new OrderModel(DBconnection::make());
    }


    public function store()
    {
        if (isset($_SESSION['user'])) {
            if (!empty($_SESSION['cart'])) {

                $order = $this->OrderModel->create($_POST, $_SESSION['total'], $_SESSION['user']);
                $orders = $this->OrderModel->selectAll();

                foreach ($_SESSION['cart'] as $key => $val) {
                    $this->OrderModel->createDetail(
                        $val['name'],
                        $val['quantity'],
                        $val['price'],
                        $orders[0]['idorder'],
                        $key

                    );
                }

                // return $this->view('orders.access', ['orders' => $orders]);
                unset($_SESSION['cart']);
                $_SESSION['success'] = "Cám ơn bạn đã mua hàng, chúc bạn một ngày tốt lành!";
                return $this->view('carts.index');
            }
        } else {
            $_SESSION['success'] = 'Bạn phải đăng nhập mới mua được hàng';
            return header('location: ./index.php?controller=User&action=index');
        }
    }
}
