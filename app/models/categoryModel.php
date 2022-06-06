<?php
class categoryModel extends Model{
    protected $product_id;
    protected $productName;
    protected $productPrice;
    protected $category;
    protected $quantity;
    protected $subCategory;   
    protected $rating;

    protected $color;


    public function __construct(){
        parent::__construct();
        $productName="";
        $category=$_GET["categoryName"];
        $productPrice="";
        $quantity="";
        $subCategory="";
        $rating="";
        $color="";
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
    
    public function getID($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT `product_id` from products WHERE (`product_id`) = :id AND (`categoryName` = 'Men')");
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT `product_id` from products WHERE (`product_id`) = :id AND(`categoryName` = 'Women')");
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT `product_id` from products WHERE (`product_id`) = :id AND (`categoryName` = 'Kids')");
        }
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->product_id;
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
    // public function getDescription($id,$category){
    //     if($category == 'Men'){
    //         $this->dbh->query("SELECT `rating` from products WHERE (`product_id`) = :id AND  (`categoryName` = 'Men')");
    //         $this->dbh->bind(':id',$id);
    //         return $this->dbh->single()->rating;
    //     }
    // }
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



    public function getStyle($id,$category){
        if($category=='Men'){
            $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Men' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->style;
        }
        if($category=='Women'){
            $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Women' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->style;
        }
        if($category=='Kids'){
            $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Kids' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->style;
        }
    }
    public function getSeason($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Men' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->season;
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Women' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->season;
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Kids' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->season;
        }
    }
    public function getNeckline($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Men' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->neckline;
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Women' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->neckline;
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Kids' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->neckline;
        }
    }
    public function getMaterial($id,$category){
        if($category == 'Men'){
            $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Men' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->material;
        }
        if($category == 'Women'){
            $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Women' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->material;
        }
        if($category == 'Kids'){
            $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=products.product_id WHERE products.categoryName='Kids' AND description.product_id=:id GROUP BY products.product_id");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->material;
        }
    }
    /************************************COLOR************************************/
    public function getColor($product_id){
        $this->dbh->query("SELECT colors.color_id FROM colors JOIN description ON colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id WHERE products.product_id=:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->resultFetchCol();
    }



 public function getSubCategory(){
     return array("Bottoms","Hoodies/Sweatshirts","T-shirt","Shoes","Jackets","Co-ords","Dresses","Blouses");
 }

}
?>