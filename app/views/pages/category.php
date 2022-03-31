
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
 class category extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        $this->displayCategory();
        // require APPROOT . '/views/inc/footer.php';
    }

 public function displayCategory(){
    ?>
    <link rel="stylesheet" href="<?php echo URLROOT . 'css/category.css'; ?>">

  <h4 class="sub-heading"> OUR CATEGORY </h4>
  <h1 class="heading">TODAY'S CLOTHING</h1>

  

  <?php
  $i=0;
  $getPrice=$this->model->getPrice();
  $getName=$this->model->getName();
  $getQuantity=$this->model->getQuantity();
  $getDescription=$this->model->getDescription();
  $getSubCategory=$this->model->getSubCategory();


  while($i<12){
  ?>
  <!---------------------------------- SHOP BY GENDER CATEGORY START---------------------------------->
    <div class="card" style="width:300px">
      <img class="card-img-top" id="myImg" src = "<?php echo ImageRoot . "category/category-".$i.".png" ; ?>" alt="Card image" >

        <div class="card-body">
          <h4 class="card-title"> <?php echo $getName[$i];?> </h4>
            <p class="card-text" style="height:70px"> <?php echo $getDescription[0];?> </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $getQuantity;?> </p>
            <a href="#" class="btn btn-primary">Add to cart</a>
            <div id="price"><?php echo"$".$getPrice;?> </div>
        </div>
    </div>
        <?php
      $i++;
    }
    ?>
    <!---------------------------------- SHOP BY GENDER CATEGORY END---------------------------------->


    <!---------------------------------- SHOP BY SUB CATEGORY START---------------------------------->

    <h3>Shop By Category</h3>
    <div id="shopByCategory">
    <?php 
    $j=0;
    while($j<6){ ?>
      <div id="shopBySingleCategory">
        <a href="<?php echo URLROOT . 'pages/subCategory'; ?>">
          <div class="row">
            <div class="column">
              <img id="imageShopByCategory" width="250%" src = "<?php echo ImageRoot . "shopByCategory/shopByCategory_".$j.".png" ; ?>" alt="Card image" >
              <div id="textShopByCategory" > <?php echo $getSubCategory[$j]?> </div>
            </div>
          </div>
          
        </a>
      </div>
      
      <?php
      $j++;
    }
    ?>
    </div> 
    <!---------------------------------- SHOP BY SUB CATEGORY END---------------------------------->
  

    <?php
  }
}
?>