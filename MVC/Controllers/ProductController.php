<?php
require_once "./models/DBconnection.php";
class ProductController extends BaseController
{

   private $productModel;


   public function __construct()
   {
      $this->load('ProductModel');
      $this->productModel = new ProductModel(DBconnection::make());
   }

   public function index()
   {

      $products = $this->productModel->selectAll();
      $productHots = $this->productModel->isHot();
      $productNews = $this->productModel->isnew();

      return $this->view('products.index', [
         'products' => $products, 'productHots' => $productHots,
         'productNews' => $productNews
      ]);
   }

  
   public function search()
   {
      if ($_SERVER['REQUEST_METHOD'] === "GET") {
         $search = $_GET['search'];

         if (!empty($search)) {
            
            $searchs = $this->productModel->search($search);

            return $this->view('products.search', ['searchs' => $searchs]);
         } else {
            echo "Không tìm thấy sản phẩm bạn muốn tìm";
         }
      }
   }

   public function detail()
   {
      $id = isset($_GET['id']) ? $_GET['id'] : '';

      $detailproducts = $this->productModel->selectId($id);
      // $sameProducts = $this->productModel->selectSameProduct($typeproducts['typeofbook_idtypeofbook']);
      return $this->view('products.detail', ['detailproducts' => $detailproducts]);
   }

   public function deleteProduct(){
      $id = isset($_GET['id']) ? $_GET['id'] : '';
      $this->productModel->delete($id);
      header('location: ./html/Books.php');
   }

   public function add(){
      if($_SERVER["REQUEST_METHOD"] === "POST"){
         $name = $_POST['name'];
         $price = $_POST['price'];
         $author = $_POST['author'];
         $producter = $_POST['producter'];
         $page = $_POST['page'];
         $year = $_POST['year'];
         $info = $_POST['info'];
         $image = "images/".$_POST['image'];         
         $qty = $_POST['qty'];
         $type = $_POST['type'];


         $this->productModel->create($name, $price, $author, $producter, $page, $year, $info, $image, $qty, $type);
         return  header('location: ./html/Books.php');
         
                                               
                                           
      }
   }


}
