<?php
class editProductModel extends Model{
    //Database Connection
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
        return $this->dbh->resultFetchCol();
    }

    public function setNeckline($neckline){
        $this->neckline = $neckline;
    }

    public function getMaterial($productId){
        $this->dbh->query("SELECT description.material FROM description JOIN products ON
            description.product_id=products.product_id WHERE products.subCategory=:subCategory
            GROUP BY products.product_id");
        $this->dbh->bind(':subCategory',$subCategory);
        return $this->dbh->resultFetchCol();
    }

    public function setMaterial($material){
        $this->material = $material;
    }

    public function getColor($productId){
        $this->dbh->query("SELECT colors.colorName FROM colors JOIN description ON
            colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id 
            WHERE products.product_id=:product_id");
        $this->dbh->bind(':product_id',$productId);
        return $this->dbh->resultSet();
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getImages($productId){
        $this->dbh->query("SELECT image.image FROM products JOIN image ON
            image.product_id=products.product_id WHERE products.subCategory=:subCategory AND
            image.product_id=:product_id AND image.image LIKE '%FRONT%' GROUP BY products.product_id;");
        $this->dbh->bind(':subCategory',$subCategory);
        $this->dbh->bind(':product_id',$productId);
        return $this->dbh->resultSet();
    }

    public function setImages($images){
        $this->images = $images;
    }

    // public function colorName($colorID){
    //     $this->dbh->query("SELECT colors.colorName FROM colors JOIN description ON
    //     colors.color_id=description.color_id JOIN products ON description.product_id=products.product_id 
    //     WHERE products.product_id=:product_id");
    //     $this->dbh->bind(':product_id',$productId);
    //     for($i=0;$i<count($this->color);$i++){
    //         if($this->color[$i]==$colorID){
    //             return $this->dbh->single()->colorName;
    //         }
    //     }
        
    // }

    public function getAllColors(){
        $this->dbh->query("SELECT * FROM colors");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }

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
                            `neckline`=:neckline,`material`=:material,`color_id`=(SELECT color_id FROM colors 
                            WHERE colorName=:color) WHERE `product_id`=:newProductId "); 
           $this->dbh->bind(':color', $newProductId);
           $this->dbh->bind(':style', $this->style);
           $this->dbh->bind(':season', $this->season);
           $this->dbh->bind(':neckline', $this->neckline);
           $this->dbh->bind(':material', $this->material);
           $this->dbh->bind(':color' , $colorID);
           $this->dbh->execute();

           $AllImages=$this->images['fileToUpload'.$colorID]['name'];
           foreach($AllImages as $image){
                $this->dbh->query("DELETE FROM image WHERE `image`=:image, `product_id`:productId,
                                (SELECT color_id FROM colors WHERE colorName=:color)");

                $this->dbh->query("INSERT INTO image(`image`,`product_id`,`color_id`) VALUES 
                (:image, :productId, (SELECT color_id FROM colors WHERE colorName=:color))");
                $this->dbh->bind(':image' , $image);
                $this->dbh->bind(':productId', $ProductId);
                $this->dbh->bind(':color' , $colorID);
                $this->dbh->execute();
            }
        }
    }

    public function deleteProduct($productId){

    }
}

?>