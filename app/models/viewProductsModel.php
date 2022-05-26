<?php
class viewProductsModel extends Model{
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
        $categrory="";
        $productPrice="";
        $quantity="";
        $subCategory="";
        $rating="";
    }
    public function getProduct($id){
        $this->dbh->query("SELECT * FROM products WHERE `categoryName`='Men'");
        $record=$this->dbh->execute();
        return $this->dbh->resultSet();
    }

    public function getNum(){
        $this->dbh->query("SELECT * FROM products");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }
    public function getName($id){
        $this->dbh->query("SELECT `name` FROM products WHERE `product_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->name;
    }
    public function getPrice($id){
        $this->dbh->query("SELECT `price` FROM products WHERE `product_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->price;
    }
    public function getQuantity($id){
        $this->dbh->query("SELECT `quantity` FROM products WHERE `product_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->quantity;
    }
    // public function getImage($id){
    //     $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE image.product_id=:id AND image.image LIKE '%FRONT%' GROUP BY products.product_id");
    //     $this->dbh->bind(':id',$id);
    //     return $this->dbh->resultSet();
    // }
    public function getImage($id){
        $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE image.product_id=:id AND image.image LIKE '%FRONT%' GROUP BY products.product_id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->resultSet();
    }
    public function getCategoryName($id){
        $this->dbh->query("SELECT `categoryName` FROM products WHERE `product_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->categoryName;
    }
    public function getSubCategory($id){
        $this->dbh->query("SELECT `subCategory` FROM products WHERE `product_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->subCategory;
    }
    public function getStyle($id){
        $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=products.product_id WHERE description.product_id=:id GROUP BY products.product_id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->style;
    }
    public function getNeckline($id){
        $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=products.product_id WHERE description.product_id=:id GROUP BY products.product_id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->neckline;
    }
    public function getMaterial($id){
        $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=products.product_id WHERE description.product_id=:id GROUP BY products.product_id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->material;
    }
    public function getSeason($id){
        $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=products.product_id WHERE description.product_id=:id GROUP BY products.product_id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->season;
    }
 }
?>