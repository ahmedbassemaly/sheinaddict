
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
 class subCategory extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        $this->subCategory();
        // require APPROOT . '/views/inc/footer.php';
    }

    public function subCategory(){
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/category.css'; ?>">
        <h1 class="heading">Sub Category Page</h1>
        <?php
    $i=0;
    while($i<6){
    ?>
    <!---------------------------------- SHOP BY GENDER CATEGORY START---------------------------------->
      <div class="card" style="width:300px">
        <img class="card-img-top" id="myImg" src = "<?php echo ImageRoot . "subCategory/subCategory-".$i.".png" ; ?>" alt="Card image" >
  
          <div class="card-body">
            <h4 class="card-title"> <?php echo "AHMED";?> </h4>
              <p class="card-text" style="height:70px"> <?php echo "BASSEM";?> </p>
              <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </div>
              <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo "5";?> </p>
              <a href="#" class="btn btn-primary">Add to cart</a>
              <div id="price"><?php echo"$ 5";?> </div>
          </div>
      </div>
          <?php
        $i++;
      }
      ?>
      <!---------------------------------- SHOP BY GENDER CATEGORY END---------------------------------->
<?php
    }

}