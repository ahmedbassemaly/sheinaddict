<link rel="stylesheet" href="<?php echo URLROOT . 'css/productInfo.css'; ?>">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
class productInfo extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        ?>

        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <img width= "23%" src="<?php echo ImageRoot . "info/info-0.png";?>">
                </div>
                <div class="images">
                    <div class="small-img">
                        <img src="<?php echo ImageRoot . "info/info-0.png";?>" onclick="showImg(this.src)">
                    </div>
                    <div class="small-img">
                        <img src="<?php echo ImageRoot . "info/info-1.png";?>" onclick="showImg(this.src)">
                    </div>
                    <div class="small-img">
                        <img src="<?php echo ImageRoot . "info/info-2.png";?>" onclick="showImg(this.src)">
                    </div>
                    <div class="small-img">
                        <img src="<?php echo ImageRoot . "info/info-3.png";?>" onclick="showImg(this.src)">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="pname">Name Here</div>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">$150</div>
                <div class="size">
                    <p>Size</p>
                    <div class="psize active">S</div>
                    <div class="psize">M</div>
                    <div class="psize">L</div>
                    <div class="psize">XL</div>  
                </div>
                <div class="quantity">
                    <p>Quantity</p>
                    <input type="number" min="1" max="50" value="1">
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