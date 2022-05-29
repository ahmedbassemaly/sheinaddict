<?php
class cartModel extends Model{
    protected $product_id;
    protected $productName;
    protected $cartItems;



    public function __construct(){
        parent::__construct();
        $this->productName = "";
        $this->cartItems = "";
    }
   
    public function getProductName($userID){

        $this->dbh->query("SELECT products.name FROM products, cart WHERE cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getProductColor($userID){

        // $this->dbh->query("SELECT colors.colorName FROM products, cart, colors WHERE color.color_id = p.color_id AND c.product_id = p.product_id AND i.image LIKE '%FRont%' AND c.user_id = :userID");
        $this->dbh->query("SELECT colors.colorName FROM cart, colors, products WHERE colors.color_id = cart.color_id AND cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        return $this->dbh->resultFetchCol();
    }

    public function getNumberOfCartItems($userID){

    $this->dbh->query("SELECT user_id FROM cart WHERE user_id=:userID");
    $this->dbh->bind(":userID",$userID);
    return $this->dbh->resultFetchCol();
}

}
?>