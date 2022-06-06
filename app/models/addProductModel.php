<?php
class addProductModel extends Model{
 //Database Connection
 protected $productId;

 protected $name;
 protected $price;
 protected $quantity;
 protected $categoryName;
 protected $subcategory;

 protected $style;
 protected $season;
 protected $neckline;
 protected $material;
 protected $color=[];

 protected $images=[];

 public $msg;

 public function __construct(){
    parent::__construct();
    $this->name ="";
    $this->price = "";
    $this->quantity = "";
    $this->categoryName = "";
    $this->subcategory = "";
    $this->style = "";
    $this->season = "";
    $this->neckline = "";
    $this->material = "";
    $this->color = array();
    $this->images= array();
    $this->msg=" ";
 }
 public function getID(){
    return $this->productId;
}
public function setID($id){
    $this->productId = $id;
}
 public function getName(){
     return $this->name;
 }
 public function setName($name){
     $this->name = $name;
 }

 public function getPrice(){
     return $this->price;
 }
 public function setPrice($price){
     $this->price = $price;
 }

 public function getQuantity(){
     return $this->quantity;
 }
 public function setQuantity($quantity){
     $this->quantity = $quantity;
 }

 public function getCategoryName(){
    return $this->categoryName;
}
public function setCategoryName($categoryName){
    $this->categoryName = $categoryName;
}

public function getsubCategory(){
    return $this->quantity;
}
public function setsubCategory($subCategory){
    $this->subCategory = $subCategory;
}

public function getStyle() {
    return $this->style;
}
public function setStyle($style){
    $this->style = $style;
}

public function getSeason(){
    return $this->season;
}
public function setSeason($season){
    $this->season = $season;
}

public function getNeckline(){
    return $this->neckline;
}
public function setNeckline($neckline){
    $this->neckline = $neckline;
}

public function getMaterial(){
    return $this->material;
}
public function setMaterial($material){
    $this->material = $material;
}

public function getColor(){
    return $this->color;
}
public function setColor($color){
    $this->color = $color;
}

public function getImages(){
    return $this->images;
}
public function setImages($images){
    $this->images = $images;
}

public function colorName($colorID){
    for($i=0;$i<count($this->color);$i++){
        if($this->color[$i]==$colorID){
            return ++$i;
        }
    }
    
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function insertProduct(){
    $this->dbh->query("SELECT product_id FROM products order by product_id desc limit 1");//betgeeb a5er (agbar) id fel database
    $productId=$this->dbh->single()->product_id;
    $newProductId=$productId+1;
    $this->setID($newProductId);
    //$this->product_id=$newProductId;
   $this->dbh->query("INSERT INTO products(`product_id`,`name`,`price`,`rating`,`quantity`,`categoryName`,`subCategory`) VALUES (:newProductId,:name, :price, :rating, :quantity, :categoryName, :subCategory)");
   $this->dbh->bind(':newProductId', $newProductId);
   $this->dbh->bind(':name', $this->name);
   $this->dbh->bind(':price', $this->price);
   $this->dbh->bind(':rating', '5');
   $this->dbh->bind(':quantity', $this->quantity);
   $this->dbh->bind(':categoryName', $this->categoryName);
   $this->dbh->bind(':subCategory', $this->subCategory);
   $this->dbh->execute();
   foreach($this->color as $colorID){
    $this->dbh->query("INSERT INTO description(`product_id`,`style`,`season`,`neckline`,`material`,`color_id`) 
    VALUES (:newProductId,:style, :season, :neckline, :material ,(SELECT color_id FROM colors WHERE colorName=:color))");
    $this->dbh->bind(':newProductId', $this->productId);
    $this->dbh->bind(':style', $this->style);
    $this->dbh->bind(':season', $this->season);
    $this->dbh->bind(':neckline', $this->neckline);
    $this->dbh->bind(':material', $this->material);
    $this->dbh->bind(':color' , $colorID);
    $this->dbh->execute();
   }
}
public function insertImages($images, $colorID){
       foreach($images as $image){
           $this->dbh->query("INSERT INTO image(`image`,`product_id`,`color_id`) 
           VALUES (:image, :newProductId, (SELECT color_id FROM colors WHERE colorName=:color))");
           $this->dbh->bind(':image' , $image);
           $this->dbh->bind(':newProductId', $this->productId);
           $this->dbh->bind(':color' , $colorID);
           $this->dbh->execute();
       }
   
}

}
?>