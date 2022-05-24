<link rel="stylesheet" href="<?php echo URLROOT . 'css/productInfo.css'; ?>">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
class productInfo extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        ?>

        <?php $product_id=$_GET['product_id']; $color_id=$_GET['color_id'];
        //echo $this->model->getImage($product_id)[0];?>

        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <?php foreach($this->model->getImageFront($product_id,$color_id) as $imageFront){ ?>
                    <img width= "23%" src="<?php echo ImageRoot ."addProduct/".$imageFront->image;?>">
                </div>
                <?php } ?>
                <div class="images">
                    <?php //for($i=0;$i<4;$i++)
                        foreach($this->model->getImage($product_id,$color_id) as $image){ ?>
                    <div class="small-img">
                        <?php //echo $product_id." ".$color_id. ?>
                        <img src="<?php echo ImageRoot ."addProduct/".$image->image ; ?>" onclick="showImg(this.src)">
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="right">
                <div class="pname"><?php echo $this->model->getName($product_id); ?></div>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="description">
                <h6 class="card-text"> <?php echo "Style: ".$this->model->getStyle($product_id);?>       </h6>
                <h6 class="card-text"> <?php echo "Season: ".$this->model->getSeason($product_id);?>     </h6>
                <h6 class="card-text"> <?php echo "Neckline: ".$this->model->getNeckline($product_id);?> </h6>
                <h6 class="card-text"> <?php echo "Material: ".$this->model->getMaterial($product_id);?> </h6>
                </div>

                <div class="price"><?php echo "EGP ".$this->model->getPrice($product_id); ?></div>


                <div class="size">
                    <p>Size</p>
                    <div class="psize active">S</div>
                    <div class="psize">M</div>
                    <div class="psize">L</div>
                    <div class="psize">XL</div>  
                </div>

                <div class="quantity">
                    <p>In Stock: </p> <div> <?php echo $this->model->getQuantity($product_id); ?> </div>
                    <!-- <input type="number" min="1" max="50" value="1"> -->
                    <!-- max will be from database -->
                </div>
                <div class="btn-box">
                    <button class="cart-btn">Add to Cart</button>
                </div>
                <div class="btn-box">
                    <button class="rating-btn">Rate Product!</button>
                </div>
            </div>
        </div>
        <br><br>
        <div class="blocks">
                <span class="open"><?php echo "Size and Fit"?></span>
                <div class="gameData">
                    <div class="words">
                    <img width= "25%" src="<?php echo ImageRoot . "chart.png";?>">
                    </div>
                </div>
        </div>
        <br><br><br>

        <div class="reviews">
            <h1>Reviews</h1>
            <h5>Write Review here</h5>
            <input type="text" name="review">
            <div class="btn">
                <button class="review-btn">Submit Review</button>
            </div>
        </div>
        <hr>
        <div class="review-section">
            <h6>Customer Name</h6>
            <p>I like this product!</p>
        </div>

        <script>
            let bigImg= document.querySelector('.big-img img');
            function showImg(pic){
                bigImg.src=pic;
            }
            </script>
            
            <script>
            $(document).ready(function() {
            jQuery('.open').on('click', function() {
                jQuery('.gameData').slideUp('fast');
                jQuery(this).next('.gameData').slideDown('fast');
            });
            });
        </script>
        <?php
        require APPROOT . '/views/inc/footer.php';
    }
}

?>