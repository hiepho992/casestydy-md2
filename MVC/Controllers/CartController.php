<?php
require_once "./models/DBconnection.php";
class CartController extends BaseController
{

    private $productModel;


    public function __construct()
    {
        $this->load('ProductModel');
        $this->productModel = new ProductModel(DBconnection::make());
    }
    public function index()
    {

        return $this->view('carts.index');
    }

   

    public function cart()
    {
        
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $resultorder = $this->productModel->selectId($id);

            foreach ($resultorder as $val);
            if ($val) {

                if (isset($_SESSION['cart'])) {


                    if (isset($_SESSION['cart'][$id]['quantity'])) {
                        $_SESSION['cart'][$id]['quantity'] += 1;
                    } else {
                        $_SESSION['cart'][$id]['quantity'] = 1;
                    }
                    $_SESSION['cart'][$id]['name'] = $val["book_name"];
                    $_SESSION['cart'][$id]['price'] = $val["book_price"];
                    $_SESSION['cart'][$id]['image'] = "./" . $val["book_image"];
                    $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
                    header("location: ./index.php?controller=product&action=detail&id={$id}");
                    exit();
                } else {
                    $_SESSION['cart'][$id]['name'] = $val["book_name"];
                    $_SESSION['cart'][$id]['price'] = $val["book_price"];
                    $_SESSION['cart'][$id]['image'] = "./" . $val["book_image"];
                    $_SESSION['cart'][$id]['quantity'] = 1;
                    $_SESSION['success'] = 'Thêm vào giỏ hàng thành công!!';
                    header("location: ./index.php?controller=product&action=detail&id={$id}");
                    exit();
                }
            } else {
                $_SESSION['success'] = 'Sản phẩm không tồn tại';
                header("location: ./index.php?controller=product&action=detail&id={$id}");
                exit();
            }
        
    }

    public function delete()
    {
        $cartid = isset($_GET['id']) ? $_GET['id']: '';
        unset($_SESSION['cart'][$cartid]);
        // $_SESSION['success'] = "Bạn muốn xóa?";
        return header('location: ./index.php?controller=Cart&action=index');
    }

    public function buyNow(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
            $resultorder = $this->productModel->selectId($id);

            foreach ($resultorder as $val);
            if ($val) {

                if (isset($_SESSION['cart'])) {


                    if (isset($_SESSION['cart'][$id]['quantity'])) {
                        $_SESSION['cart'][$id]['quantity'] += 1;
                    } else {
                        $_SESSION['cart'][$id]['quantity'] = 1;
                    }
                    $_SESSION['cart'][$id]['name'] = $val["book_name"];
                    $_SESSION['cart'][$id]['price'] = $val["book_price"];
                    $_SESSION['cart'][$id]['image'] = "./" . $val["book_image"];
                    $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
                    header("location: ./index.php?controller=Cart&action=index");
                    exit();
                } else {
                    $_SESSION['cart'][$id]['name'] = $val["book_name"];
                    $_SESSION['cart'][$id]['price'] = $val["book_price"];
                    $_SESSION['cart'][$id]['image'] = "./" . $val["book_image"];
                    $_SESSION['cart'][$id]['quantity'] = 1;
                    $_SESSION['success'] = 'Thêm vào giỏ hàng thành công!!';
                    header("location: ./index.php?controller=Cart&action=index");
                    exit();
                }
            } else {
                $_SESSION['success'] = 'Sản phẩm không tồn tại';
                header("location: ./index.php?controller=product&action=index");
                exit();
            }
        
    }
}
