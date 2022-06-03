
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
  $i=1;
  $getSubCategory=$this->model->getSubCategory();
  $id=$_GET["categoryName"];
  $_SESSION['categoryName']=$_GET["categoryName"];
  
  $result=$this->model->getProduct($id);
  
  
    foreach($result as $product){
      //$color=$this->model->getColor($product->product_id);
  ?>
  <!---------------------------------- SHOP BY GENDER CATEGORY START---------------------------------->
    <div class="card" style="width:300px">
    <?php
    foreach($this->model->getImage($product->product_id,$id) as $image){ ?>
      <img class="card-img-top" id="myImg" alt="image not found" src = "<?php echo ImageRoot . "addProduct/".$image->image; ?>" >
      <?php }?>
        <div class="card-body">
          <h4 class="card-title"> <?php echo $this->model->getName($product->product_id,$id);?> </h4>
          <h4 class="card-text"> <?php echo "Style: ".$this->model->getStyle($product->product_id,$id);?>       </h4>
              <h4 class="card-text"> <?php echo "Season: ".$this->model->getSeason($product->product_id,$id);?>     </h4>
              <h4 class="card-text"> <?php echo "Neckline: ".$this->model->getNeckline($product->product_id,$id);?> </h4>
              <h4 class="card-text"> <?php echo "Material: ".$this->model->getMaterial($product->product_id,$id);?> </h4>
          
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $this->model->getQuantity($product->product_id,$id);?> </p>

            <?php if(empty($_SESSION['userType_id'])){
            ?> <a href="<?php echo URLROOT . '/users/Register'; ?>" class="btn btn-primary">View Product</a>
            <?php } 
             else if($_SESSION['userType_id']==1){ 
            ?> <a href="<?php echo URLROOT . '/pages/editProduct'; ?>" class="btn btn-primary">Edit Product</a>
            <?php }
            else{ 
            ?> <a href="<?php echo URLROOT . 'pages/productInfo?product_id='.$product->product_id.'&color_id='.$this->model->getColor($product->product_id)[0];?>" class="btn btn-primary">View Product</a>
            <?php } ?>

            <div id="price"><?php echo"EGP ".$this->model->getPrice($product->product_id,$id);?> </div>
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
    
    if($_SESSION['categoryName']=='Men'){
    $j=0;
    while($j<6){ ?>
        <div id="shopBySingleCategory">
          <a href="<?php echo URLROOT . 'pages/subCategory?subCategoryName='.$getSubCategory[$j]; ?>">
            <div class="row">
              <div class="column">
                <input type="image" width="250%" name="imgbtn" src = "<?php echo ImageRoot . "shopByCategory/shopByCategory_".$j.".png" ; ?>"  alt="Tool Tip">
                <div id="textShopByCategory" > <?php echo $getSubCategory[$j]?> </div>
              </div>
            </div>
          </a>
        </div>
      <?php
      $j++;
      }
    }
    else{
      $i=0;
    while($i<8){ ?>
        <div id="shopBySingleCategory">
          <a href="<?php echo URLROOT . 'pages/subCategory?subCategoryName='.$getSubCategory[$i]; ?>">
            <div class="row">
              <div class="column">
                <input type="image" width="250%" name="imgbtn" src = "<?php echo ImageRoot . "shopByCategory/shopByCategory_".$i.".png" ; ?>"  alt="Tool Tip">
                <div id="textShopByCategory" > <?php echo $getSubCategory[$i]?> </div>
              </div>
            </div>
          </a>
        </div>
      <?php
      $i++;
      }
    }
    ?>
    </div> 
    <!---------------------------------- SHOP BY SUB CATEGORY END---------------------------------->
  

    <?php
  }
}
?>