<?php
class OrderModel
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($input, $amount, $user)
    {
        $amounts = $amount;
        $name = $input['name'];
        $address = $input['address'];
        $phone = $input['phone'];
        $id = $user['idusers'];
        $sql = "INSERT INTO `buybooks`.`order`
        (`order_date`,`status`,`amount`,`customers_name`,`customers_address`,`customers_phone`,`idusers`)        
        VALUES(now(), 0, '$amounts', '$name', '$address', '$phone', '$id')";
        $this->connection->exec($sql);
    }

    public function selectAll()
    {

        $sql = "SELECT `order`.`idorder`,
        `order`.`order_date`,
        `order`.`status`,
        `order`.`amount`,
        `order`.`customers_name`,
        `order`.`customers_address`,
        `order`.`customers_phone`,
        `order`.`idusers`
        FROM `buybooks`.`order`;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
 
    public function createDetail($name1, $qty1, $price1, $idorder1, $idbook1)
    {
        $name = $name1;
        $qty = $qty1;
        $price =   $price1;
        $idorder = $idorder1;
        $idbook =  $idbook1;

        $sql = "INSERT INTO `buybooks`.`orderdetails`(`book_name`,`quantity`,`price`,`order_idorder`,`book_idbooks`)
        VALUES('$name', $qty, $price, $idorder, $idbook);";
        $this->connection->exec($sql);
   
    }
}
