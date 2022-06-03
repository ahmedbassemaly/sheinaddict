<link rel="stylesheet" href="<?php echo URLROOT . 'css/cart.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
<?php
class adminReviews extends view
{
    public function output(){
    ?>
    <p>
        <?php
        $id=0;
        $reviews = $this->model->viewReview($id);
        foreach($reviews as $review){
            echo $review->firstName;
            echo "<br>";
            echo $review->comment."    ".$review->date;
            echo "<br>";
            echo $review->rating ."    ".$review->name;
            echo "<br><br><br>";
        }
        ?>
    </p>
    <?php
    }
}
?>
