<?php
class ordersModel extends model{
    public function getOrdersDescription(){
        //Season
        return array("Color:Coffee Brown<br>Style:Casual<br>Neckline:Hooded<br>Material:Polyester");
    }

    public function order(){
        $this->dbh->query("SELECT users.firstName, users.LastName, image.image, orders.totalItems, 
        orders.totalAmount, orders.date, orderproduct.size, colors.colorName from image, colors, products, 
        orders,orderproduct, users 
        WHERE orders.order_id = orderproduct.order_id AND orders.user_id = 5 
        AND orderproduct.color_id = colors.color_id AND orderproduct.product_id = products.product_id 
        AND image.product_id = orderproduct.product_id AND image.image LIKE CONCAT( '%',:color_ID, '%') AND image.image LIKE '%30%'");
    }

    public function customerName(){
        $this->dbh->query("SELECT users.firstName FROM users, orders WHERE users.user_id = orders.user_id");
        return $this->dbh->resultFetchCol();
    }

    public function orderID(){
        $this->dbh->query("SELECT order_id FROM users, orders WHERE users.user_id = orders.user_id");
        return $this->dbh->resultFetchCol();
    }

    public function Image($orderID){
        $this->dbh->query("SELECT image.image, orderproduct.order_id FROM image, orderproduct, orders WHERE  
        image.product_id = orderproduct.product_id AND orderproduct.order_id = :orderID
        AND image LIKE '%FRONT%' AND image.color_id = orderproduct.color_id GROUP BY orderproduct.color_id");
        $this->dbh->bind(':orderID',$orderID);
        return $this->dbh->resultFetchCol();
    }

    public function totalAmount($orderID){
        $this->dbh->query("SELECT totalAmount FROM orders WHERE order_id = :orderID");
        $this->dbh->bind(':orderID',$orderID);
        return $this->dbh->resultFetchCol();
    }

    public function totalItems($orderID){
        $this->dbh->query("SELECT totalItems FROM orders WHERE order_id = :orderID");
        $this->dbh->bind(':orderID',$orderID);
        return $this->dbh->resultFetchCol();
    }
}
?>