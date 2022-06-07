<link rel="stylesheet" href="<?php echo URLROOT . 'css/adminReviews.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
<?php
class adminReviews extends view
{
    public function output(){
    
    require APPROOT . '/views/inc/sidebar.php';
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    }

    public function printForm(){
    ?>
    <p>
        <div class="container">
        <br><h2 class="heading">Reviews</h2> <br><br>       
        <table class="table table-hover" style="white-space: nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th> 
                <th>Product Name</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Rating</th>              
            </tr>
            </thead>
            <tbody>
        <?php
        $id=0;
        $reviews = $this->model->viewReview($id);
        foreach($reviews as $review){
            ?>
            <tr>
                <td><?php echo $id+1 ?></td>
                <td><?php echo $review->firstName; ?></td>
                <td><?php echo  $review->name;?></td>
                <td><?php echo $review->comment; ?></td>
                <td><?php echo $review->date; ?></td>
                <td><?php echo $review->rating;?></td>                
            </tr>
            <?php
        }
        ?>
    </p>
    <?php
    }

}
?>
