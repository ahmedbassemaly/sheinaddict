<?php
class viewProductsModel extends Model{
 //Database Connection
    public function viewProducts(){

    }
    public function getName(){

    return array(
        "Men's t-shirt","Men's trousers","Men's hoodie","Men's jacket",
        "Kid's pijama","Kid's T-shirt","Kid's clothes","Kid's Half Button",
        "Women's t-shirt","Women's dress","Women's trousers","Women's t-shirt"
    );
    }

    public function getPrice(){
        return 12.99;
    }

    public function getRating(){

    }

    public function getQuantity(){
        return 5;
    }

    public function getDescription(){
        //Season
        return array("Color:Coffee Brown<br>Style:Casual<br>Neckline:Hooded<br>Material:Polyester");
    }

    public function getSubCategory(){
        return array("Bottoms","Hoodies <br>&Sweatshirts","T-shirts","Shoes","Jackets","Co-ords");
    }
 }
?>