<?php
class cartModel extends Model{
    protected $product_id;
    protected $productName;


    public function __construct(){
        parent::__construct();

    }
   
    public function getProductName($userID){

        $this->dbh->query("SELECT products.name FROM products, cart WHERE cart.product_id = products.product_id AND cart.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        $this->dbh->resultFetchCol();
    }

    public function getProductImage($userID,$productID){

        $this->dbh->query("SELECT i.image,p.product_id FROM products p, cart c, image i WHERE i.product_id = p.product_id AND c.product_id = p.product_id AND i.image LIKE '%FRont%' AND c.user_id = :userID");
        $this->dbh->bind(':userID',$userID);
        $this->dbh->resultFetchCol();
    }
}
?>