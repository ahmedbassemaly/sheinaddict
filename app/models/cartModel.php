<?php
class cartModel extends Model{
    protected $product_id;
    protected $productName;
    protected $cartItems;
    protected $order_id;



    public function __construct(){
        parent::__construct();
        $this->productName = "";
        $this->cartItems = "";
        $this->order_id="";
    }
   
    public function getProductName($userID){

        $this->dbh->query("SELECT products.name FROM products, cart WHERE cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getProductID(){

        $this->dbh->query("SELECT cart.product_id from cart, products WHERE cart.product_id = products.product_id");
        return $this->dbh->resultFetchCol();
    }
   
    public function getProductImage($ID, $name){

        $this->dbh->query("SELECT image.image FROM image WHERE image.image LIKE CONCAT( '%',:id, '%') AND image.image LIKE CONCAT( '%', :name, '%') AND image.image LIKE '%FRONT%'");
        $this->dbh->bind(':id',$ID);
        $this->dbh->bind(':name',$name);
        return $this->dbh->resultFetchCol();
    }

    public function getProductColor($userID){

        // $this->dbh->query("SELECT colors.colorName FROM products, cart, colors WHERE color.color_id = p.color_id AND c.product_id = p.product_id AND i.image LIKE '%FRont%' AND c.user_id = :userID");
        $this->dbh->query("SELECT colors.colorName FROM cart, colors, products WHERE colors.color_id = cart.color_id AND cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getProductPrice($userID){

        // $this->dbh->query("SELECT colors.colorName FROM products, cart, colors WHERE color.color_id = p.color_id AND c.product_id = p.product_id AND i.image LIKE '%FRont%' AND c.user_id = :userID");
        $this->dbh->query("SELECT products.price FROM products, cart WHERE cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getSize($userID){

        // $this->dbh->query("SELECT colors.colorName FROM products, cart, colors WHERE color.color_id = p.color_id AND c.product_id = p.product_id AND i.image LIKE '%FRont%' AND c.user_id = :userID");
        $this->dbh->query("SELECT cart.size FROM cart,products WHERE cart.product_id = products.product_id AND user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getNumberOfCartItems($userID){

    $this->dbh->query("SELECT user_id FROM cart WHERE user_id=:userID");
    $this->dbh->bind(":userID",$userID);
    return $this->dbh->resultFetchCol();
}

public function deleteFromCart($userID){

    $this->dbh->query("DELETE FROM cart WHERE `user_id` = :userID");
    $this->dbh->bind(':userID',$userID);
    return $this->dbh->execute();
}


public function insertIntoOrders($totalAmount, $country, $userID){

    $this->dbh->query("INSERT INTO orders(`totalItems` , `totalAmount`, `date`, `country`, `user_id`) VALUES((SELECT COUNT(user_id) FROM cart WHERE user_id=:userID), :totalAmount, NOW(), :country, :userID)");
    $this->dbh->bind(':userID',$userID);
    // $this->dbh->bind('totalItems',$totalItems);
    $this->dbh->bind('totalAmount',$totalAmount);
    $this->dbh->bind('country',$country);
    $this->dbh->execute();
}

public function orderID($userID){
    $this->dbh->query("SELECT order_id FROM orders WHERE `user_id`=:userID AND order_id=(select Max(order_id)from orders)");
    $this->dbh->bind(':userID',$userID);
    return $this->dbh->single()->order_id;
}

public function productID($userID){
    $this->dbh->query("SELECT cart.product_id FROM cart, orders  WHERE cart.user_id = :userID and orders.order_id = (SELECT MAX(order_id) FROM orders)");
    $this->dbh->bind(':userID',$userID);
    return$this->dbh->resultFetchCol();
}

public function colorID($userID){
    $this->dbh->query("SELECT cart.color_id FROM cart, orders  WHERE cart.user_id = :userID and orders.order_id = LAST_INSERT_ID()");
    $this->dbh->bind(':userID',$userID);
    return $this->dbh->resultFetchCol();
}

public function insertIntoOrderProducts($orderID, $productID, $size, $colorID){
    $this->dbh->query("INSERT INTO orderproduct(`order_id`, `product_id`, `size` ,`color_id`) VALUES (:orderID, :productID, :size, :colorID)");
    $this->dbh->bind(':orderID',$orderID);
    $this->dbh->bind(':productID',$productID);
    $this->dbh->bind(':size',$size);
    $this->dbh->bind(':colorID',$colorID);
    $this->dbh->execute();
}

}
?>