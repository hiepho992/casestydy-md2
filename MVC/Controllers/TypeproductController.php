<?php
require_once "./models/DBconnection.php";
class TypeproductController extends BaseController{

    private $TypeproductModel;
    
    public function __construct()
   {
      $this->load('TypeproductModel');
      $this->load('ProductModel');
      $this->TypeproductModel = new TypeproductModel(DBconnection::make());
   }
    public function index(){

        $typeproducts = $this->TypeproductModel->selectAll();
        return $this->view('page.header', ['typeproducts' => $typeproducts]); 
    }

    public function add(){
       
            $name = isset($_POST["name"]) ? $_POST["name"] : '' ;
            $this->TypeproductModel->create($name);
            return header("location: ./html/typebook.php");
    }

    public function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $this->TypeproductModel->delete($id);
        return header('location: ./html/typebook.php');
     }
}
