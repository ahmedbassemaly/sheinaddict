<?php
class productInfoModel extends Model{
    //Product
    protected $name;
    protected $price;
    protected $rating;
    protected $quantity;

    //Description
    protected $style;
    protected $season;
    protected $neckline;
    protected $material;

    //color
    protected $color=[];
    protected $colorName;
    protected $colo_id;
    public $sendColor;

    //image
    protected $image=[];

    //cart
    protected $size;

    public $msg;

    public function __construct(){
        parent::__construct();
        $this->name ="";
        $this->price = "";
        $this->rating = "";
        $this->quantity = "";

        $this->style="";
        $this->season = "";
        $this->neckline = "";
        $this->material = "";

        $this->color = array();
        $this->colorName = "";
        $this->color_id = "";
        $this->sendColor = "";

        $this->image = array();

        $this->size="";
        $this->msg="";
    }

    /************************************PRODUCT************************************/
    public function getName($product_id){
        $this->dbh->query("SELECT name FROM products WHERE `product_id` =:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->name;
    }
    public function getPrice($product_id){
        $this->dbh->query("SELECT price FROM products WHERE `product_id` =:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->price;
    }
    public function getRating($product_id){
        $this->dbh->query("SELECT rating FROM products WHERE `product_id` =:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->rating;
    }
    public function getQuantity($product_id){
        $this->dbh->query("SELECT quantity FROM products WHERE `product_id` =:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->quantity;
    }

    /************************************DESCRIBTION************************************/
    public function getStyle($product_id){
        $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=:product_id GROUP BY description.product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->style;
    }
    public function getSeason($product_id){
        $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=:product_id GROUP BY description.product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->season;
    }
    public function getNeckline($product_id){
        $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=:product_id GROUP BY description.product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->neckline;
    }
    public function getMaterial($product_id){
        $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=:product_id GROUP BY description.product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->single()->material;
    }

    /************************************IMAGE************************************/
    public function getImage($product_id,$color_id){
        $this->dbh->query("SELECT image.image,image.product_id,image.color_id FROM image JOIN products ON image.product_id=products.product_id JOIN colors ON colors.color_id=image.color_id WHERE image.product_id=:product_id AND colors.color_id=:color_id");
        $this->dbh->bind(':product_id',$product_id);
        $this->dbh->bind(':color_id',$color_id);
        // return $this->dbh->single()->image;
        return $this->dbh->resultSet();
    }

    public function getImageFront($product_id,$color_id){
        $this->dbh->query("SELECT image.image,image.product_id,image.color_id FROM image JOIN products ON image.product_id=products.product_id JOIN colors ON colors.color_id=image.color_id WHERE image.product_id=:product_id AND image.image LIKE '%FRONT%' AND colors.color_id=:color_id");
        $this->dbh->bind(':product_id',$product_id);
        $this->dbh->bind(':color_id',$color_id);
        // return $this->dbh->single()->image;
        return $this->dbh->resultSet();
    }

    /************************************COLOR************************************/
    // public function getColor($product_id){
    //     $this->dbh->query("SELECT colors.colorName FROM colors JOIN description ON colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id WHERE products.product_id=:product_id");
    //     $this->dbh->bind(':product_id',$product_id);
    //     return $this->dbh->resultSet();
    // }

    public function getColor($product_id){
        $this->dbh->query("SELECT c.colorName FROM colors c, products p, description d Where p.product_id= d.product_id AND c.color_id = d.color_id AND p.product_id=:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->resultFetchCol();
    }

    public function getColorID($product_id){
        $this->dbh->query("SELECT c.color_id FROM colors c, products p, description d Where p.product_id= d.product_id AND c.color_id = d.color_id AND p.product_id=:product_id");
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->resultFetchCol();
    }

    public function selectFromCart($userID,$productID,$colorID){
        $this->dbh->query("SELECT * FROM cart Where `product_id`= :productID AND `color_id` = :colorID AND `user_id` =:userID");
        $this->dbh->bind(':productID',$productID);
        $this->dbh->bind(':colorID',$colorID);
        $this->dbh->bind(':userID',$userID);

        return $this->dbh->resultSet();
    }


   /************************************ ADD TO CART ************************************/ 

    public function insertIntoCart($userID,$productID,$colorID){

        $this->dbh->query("INSERT INTO cart(`user_id`, `product_id`, `size`, `color_id`) VALUES(:userID, :productID, :size, :colorID)");
        $this->dbh->bind(':userID',$userID);
        $this->dbh->bind(':productID',$productID);
        $this->dbh->bind(':size',$this->size);
        $this->dbh->bind(':colorID',$colorID);
        $this->dbh->execute();
    }
}
?>