<link rel="stylesheet" href="<?php echo URLROOT . 'css/productInfo.css'; ?>">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
class productInfo extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        echo "<br><br><br>";
        ?>
        <div>
            <?php 
            echo $this->model->msg;
            ?>
        </div>
        <?php $product_id=$_GET['product_id']; $color_id=$_GET['color_id'];
        //echo $this->model->getImage($product_id)[0];?>

        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <?php foreach($this->model->getImageFront($product_id,$this->model->sendColor) as $imageFront){ ?>
                    <img width= "23%" src="<?php echo ImageRoot ."addProduct/".$imageFront->image;?>">
                </div>
                <?php } ?>
                <div class="images">
                    <?php //for($i=0;$i<4;$i++)
                        foreach($this->model->getImage($product_id,$this->model->sendColor) as $image){ ?>
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

        <?php
        
        $size_arr=['S','M','L','XL'];
        ?>

                <div class="size">
                 <p>Size</p>
                    <?php foreach($size_arr as $size){ ?>
                        <div class="psize">
                        <a href="<?php echo URLROOT .'pages/productInfo?product_id='.$product_id.'&color_id='.$color_id. '&size='.$size?>"><?php echo $size;?></a>
                        </div>
                    <?php 
                    }
                    ?>

                    <!-- <div class="psize">M</div>
                    <div class="psize">L</div>
                    <div class="psize">XL</div>   -->
                </div>
            
            <div>
                <?php
                $colorID = $this->model->getColorID($product_id);
                $color=$this->model->getColor($product_id);
                for($i=0;$i<count($color); $i++){
                    ?>
                    <a href="<?php echo URLROOT .'pages/productInfo?product_id='.$product_id.'&color_id='.$color_id.'&color_id2='. $colorID[$i];?>"><div class="circle" style="background-color:<?php echo $color[$i];?>" > </div></a>
                    <?php
                  echo $color[$i];
                }?>

            </div>


                <div class="quantity">
                    <p>In Stock: </p> <div> <?php echo $this->model->getQuantity($product_id); ?> </div>
                    <!-- <input type="number" min="1" max="50" value="1"> -->
                    <!-- max will be from database -->
                </div>

            <form action="" method="POST">
                <input type ="hidden" name ="size" value="reem is tired">
                <div class="btn-box">
                <button type="submit" name="addtocart" value="<?php echo $product_id ?>">Add To Cart</button>
                </div>
            </form>


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
        <?php
        $result = $this->model->viewReview($product_id);
            foreach($result as $review){
        ?>
        <div class="review-section">
            <!-- <p><?php echo $review->firstName;?></p>
            <p><?php echo $review->comment;?></p> -->
            
            <table class="table w-auto">
            <tbody>
                <tr>
                <td><?php echo $review->firstName;?></td>
                <td><?php echo $review->comment;?></td>
                </tr>
            </tbody>
            </table>
        </div>
        <?php } ?>

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
