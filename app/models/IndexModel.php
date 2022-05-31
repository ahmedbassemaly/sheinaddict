<?php
class IndexModel extends model
{
     public $title = 'MIU SE305 Blog ' . APP_VERSION;
     public $subtitle = 'Example of MVC PHP framework for SE305';

     public function getProducts(){

          $this->dbh->query("SELECT p.*,i.image FROM products p, image i WHERE p.product_id=i.product_id ORDER BY RAND()LIMIT 5");
          $result= $this->dbh->execute();
     }

     // public function getNumberOfCartItems($userID){

     //      $this->dbh->query("SELECT user_id FROM cart WHERE user_id=:userID");
     //      $this->dbh->bind(":userID",$userID);
     //      return $this->dbh->resultFetchCol();
     // }
     public function getProductRandom($id){
          $this->dbh->query("SELECT DISTINCT p.name,p.price,p.quantity,p.categoryName,p.subCategory, i.image, d.style,d.neckline,d.season,d.material FROM products p, image i, description d  WHERE p.product_id=i.product_id AND p.product_id = d.product_id AND p.product_id=:id AND i.image LIKE '%Front%'");
          $this->dbh->bind(':id',$id);
          $this->dbh->execute();
          return $this->dbh->resultSet();
     }
     public function getCount(){
          $this->dbh->query("SELECT * FROM products");
          $this->dbh->execute();
          return $this->dbh->rowCount();
     }
}
