<?php
class subCategoryModel extends model{
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
    protected $color;

    //image
    protected $image;

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

        $this->color = "";

        $this->image = "";
    }
    
    //Product
    public function getName($subCategory,$categoryName){
        $this->dbh->query("SELECT name,product_id,rating FROM products WHERE `subCategory`=:subCategory AND `categoryName`=:categoryName");
        $this->dbh->bind(':subCategory',$subCategory);
        $this->dbh->bind(':categoryName',$categoryName);
        return $this->dbh->resultSet();
    }
    public function getPrice($subCategory){
        $this->dbh->query("SELECT price FROM products WHERE `subCategory`=:subCategory");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }
    public function getRating($subCategory){
        $this->dbh->query("SELECT rating FROM products WHERE `subCategory`=:subCategory");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultSet();
    }
    public function getQuantity($subCategory){
        $this->dbh->query("SELECT quantity FROM products WHERE `subCategory`=:subCategory");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }

    /************************************DESCRIBTION************************************/
    public function getStyle($subCategory){
        $this->dbh->query("SELECT description.style FROM description JOIN products ON description.product_id=products.product_id WHERE products.subCategory=:subCategory GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }
    public function getSeason($subCategory){
        $this->dbh->query("SELECT description.season FROM description JOIN products ON description.product_id=products.product_id WHERE products.subCategory=:subCategory GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }
    public function getNeckline($subCategory){
        $this->dbh->query("SELECT description.neckline FROM description JOIN products ON description.product_id=products.product_id WHERE products.subCategory=:subCategory GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }
    public function getMaterial($subCategory){
        $this->dbh->query("SELECT description.material FROM description JOIN products ON description.product_id=products.product_id WHERE products.subCategory=:subCategory GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }

    /************************************COLOR************************************/
    public function getColor($subCategory,$product_id){
        $this->dbh->query("SELECT colors.colorName FROM colors JOIN description ON colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id WHERE products.subCategory=:subCategory AND products.product_id=:product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->resultSet();
    }

    /************************************IMAGE************************************/
    public function getImage($subCategory,$product_id){
        $this->dbh->query("SELECT image.image FROM products JOIN image ON image.product_id=products.product_id WHERE products.subCategory=:subCategory AND image.product_id=:product_id AND image.image LIKE '%FRONT%' GROUP BY products.product_id;");
        $this->dbh->bind(':subCategory',$subCategory);
        $this->dbh->bind(':product_id',$product_id);
        return $this->dbh->resultSet();
    }

    public function product($subCategory){
        $this->dbh->query("SELECT * FROM products WHERE `subCategory`=:subCategory");
        $this->dbh->bind(':subCategory',$subCategory);
        $result=$this->dbh->execute();
    }


}
?>