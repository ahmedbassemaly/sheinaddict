<?php
class categoryModel extends Model{
    protected $product_id;
    protected $productName;
    protected $productPrice;
    protected $category;
    protected $quantity;
    protected $subCategory;   
    protected $rating;


    public function __construct(){
        parent::__construct();
        $productName="";
        $category=$_GET["categoryName"];
        $productPrice="";
        $quantity="";
        $subCategory="";
        $rating="";
    }
    public function getProduct($category){
        if($category == 'Men'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Men'");
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Women'");
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Kids'");
        }
        
        $record=$this->dbh->execute();
        return $this->dbh->resultSet();
    }
    public function getNum($category){
        if($category == 'Men'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Men'");
            $this->dbh->execute();
            return $this->dbh->rowCount();
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Women'");
            $this->dbh->execute();
            return $this->dbh->rowCount();
        }
        else if($category == 'Kids'){
            $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Kids'");
            $this->dbh->execute();
            return $this->dbh->rowCount();
        }
    }
    public function getName($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `name` from products WHERE (`product_id`) = :id AND (`categoryName` = 'Men')");
            // $this->dbh->bind(':id',$id);
            // return $this->dbh->single()->name;
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT `name` from products WHERE (`product_id`) = :id AND(`categoryName` = 'Women')");
            // $this->dbh->bind(':id',$id);
            // return $this->dbh->single()->name;
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT `name` from products WHERE (`product_id`) = :id AND (`categoryName` = 'Kids')");
            
        }
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->name;
    }
    public function getPrice($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `price` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Men')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->price;
        }
        else if($category == 'Women'){
            $this->dbh->query("SELECT `price` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Women')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->price;
        }
        else if($category == 'Kids'){
            $this->dbh->query("SELECT `price` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Kids')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->price;
        }
    }
    public function getQuantity($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `quantity` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Men')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->quantity;
        }
        else if($category == 'Women'){
            $this->dbh->query("SELECT `quantity` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Women')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->quantity;
        }
        else if($category == 'Kids'){
            $this->dbh->query("SELECT `quantity` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Kids')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->quantity;
        }
    }
    public function getRating($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `rating` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Men')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->rating;
        }
        else if($category == 'Women'){
            $this->dbh->query("SELECT `rating` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Women')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->rating;
        }
        else if($category == 'Kids'){
            $this->dbh->query("SELECT `rating` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Kids')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->rating;
        }
    }
    public function getDescription($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `rating` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Men')");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->rating;
        }
    }
    public function getImage($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE products.categoryName = 'Men' AND image.product_id=:id AND image.image LIKE '%FRONT%' GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->resultSet();
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE products.categoryName = 'Women' AND image.product_id=:id AND image.image LIKE '%FRONT%' GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->resultSet();
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE products.categoryName = 'Kids' AND image.product_id=:id AND image.image LIKE '%FRONT%' GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->resultSet();
        }
    }
    public function getSubCategory(){
        return array("Bottoms","Hoodies <br>&Sweatshirts","T-shirts","Shoes","Jackets","Co-ords");
    }

}
?>