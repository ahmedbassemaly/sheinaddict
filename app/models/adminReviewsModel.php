<?php
require_once 'reviewInterface.php';
class adminReviewsModel extends Model implements review{

    public function viewReview($product_id){
        $this->dbh->query("SELECT users.firstName, reviews.comment, reviews.date, reviews.rating, products.name 
        FROM reviews, users, products WHERE reviews.user_id=users.user_id 
        AND reviews.product_id = products.product_id");
        return $this->dbh->resultSet();
    }
}