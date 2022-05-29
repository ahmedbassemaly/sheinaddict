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
}
