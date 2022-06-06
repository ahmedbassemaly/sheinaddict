<?php
class editProductModel extends Model{
    protected $productId;

    protected $name;
    protected $price;
    protected $quantity;
    protected $categoryName;
    protected $subCategory;

    protected $style;
    protected $season;
    protected $neckline;
    protected $material;
    protected $color=[];

    protected $images=[];

    public function __construct(){
        parent::__construct();
        
        $this->name ="";
        $this->price = "";
        $this->quantity = "";
        $this->categoryName = "";
        $this->subCategory = "";
        $this->style = "";
        $this->season = "";
        $this->neckline = "";
        $this->material = "";
        $this->color = array();
        $this->images= array();
    }

    public function getName($productId){
        $this->dbh->query("SELECT name FROM products WHERE `product_id`=:productID");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getPrice($productId){
        $this->dbh->query("SELECT price FROM products WHERE `product_id`=:productID");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getQuantity($productId){
        $this->dbh->query("SELECT quantity FROM products WHERE `product_id`=:productID");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->quantity;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getCategoryName($productId){
        $this->dbh->query("SELECT categoryName FROM products WHERE `product_id`=:productID");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->categoryName;
    }
    public function setCategoryName($categoryName){
        $this->categoryName = $categoryName;
    }

    public function getSubCategory($productId){
        $this->dbh->query("SELECT subCategory FROM products WHERE `product_id`=:productID");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->subCategory;
    }
    public function setSubCategory($subCategory){
        $this->subCategory = $subCategory;
    }

    public function getStyle($productId) {
        $this->dbh->query("SELECT description.style FROM description, products 
        WHERE description.product_id=products.product_id AND products.product_id=:productID 
        GROUP BY description.style");
        $this->dbh->bind(':productID',$productId);
        return $this->dbh->single()->style;
    }
    public function setStyle($style){
        $this->style = $style;
    }

    public function getSeason($productId){
        $this->dbh->query("SELECT description.season FROM description JOIN products ON
            description.product_id=products.product_id WHERE products.subCategory=:subCategory
            GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }
    public function setSeason($season){
        $this->season = $season;
    }

    public function getNeckline($productId){
        $this->dbh->query("SELECT description.neckline FROM description JOIN products ON
            description.product_id=products.product_id WHERE products.subCategory=:subCategory 
            GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->single()->neckline;
    }
    public function setNeckline($neckline){
        $this->neckline = $neckline;
    }

    public function getMaterial($productId){
        $this->dbh->query("SELECT description.material FROM description JOIN products ON
            description.product_id=products.product_id WHERE products.subCategory=:subCategory
            GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->single()->material;
    }
    public function setMaterial($material){
        $this->material = $material;
    }

/************************************COLORS************************************************/
    public function getAllColors(){
        $this->dbh->query("SELECT * FROM colors");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }
    public function getColor($productId){
        $this->dbh->query("SELECT colors.colorName FROM colors JOIN description ON
            colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id 
            WHERE products.product_id=:product_id");
        $this->dbh->bind(':product_id',$productId);
        return $this->dbh->resultFetchCol();
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function colorName($colorID){
        for($i=0;$i<count($this->color);$i++){
            if($this->color[$i]==$colorID){
                return ++$i;
            }
        }
    }
/************************************COLORS************************************************/


/************************************IMAGES************************************************/
    public function getImages($productId){
        return $this->images;
    }

    public function setImages($images){
        $this->images = $images;
    }
/************************************IMAGES************************************************/


    public function editProduct($productId){
        $this->dbh->query("UPDATE products SET `name`=:name, `price`=:price,
                        `quantity`=:quantity, `categoryName`=:categoryName, `subCategory`=:subCategory 
                        WHERE   `product_id`=:productId");
        $this->dbh->bind(':productId', $productId);
        $this->dbh->bind(':name', $this->name);
        $this->dbh->bind(':price', $this->price);
    //    $this->dbh->bind(':rating', '5');
        $this->dbh->bind(':quantity', $this->quantity);
        $this->dbh->bind(':categoryName', $this->categoryName);
        $this->dbh->bind(':subCategory', $this->subCategory);
        $this->dbh->execute();

        foreach($this->color as $colorID){
        $this->dbh->query("UPDATE description SET `style`=:style ,`season`=:season,
                                `neckline`=:neckline,`material`=:material,(UDPATE color_id FROM colors WHERE colorName=:color),
                                WHERE `product_id`=:productId "); 
                                //,`color_id`=".$x->color_id[$i]."
        $this->dbh->bind(':productId', $productId);
        $this->dbh->bind(':style', $this->style);
        $this->dbh->bind(':season', $this->season);
        $this->dbh->bind(':neckline', $this->neckline);
        $this->dbh->bind(':material', $this->material);
        $this->dbh->bind(':color' , $colorID);
        $this->dbh->execute();
        }
    }

/*******************************************DELETE PRODUCT**********************************************************/
public function deleteProduct($productID){
    $this->dbh->query("DELETE FROM products WHERE product_id=:product_id");
    $this->dbh->bind(':product_id', $productID);
    $result=$this->dbh->execute();
}


}

?>