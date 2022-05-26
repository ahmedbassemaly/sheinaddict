
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
        <h1 class="heading" style="margin-top:5%;">Sub Category Page</h1>
        <?php
    $i=0;
    $subCategoryName=$_GET['subCategoryName'];
    $categoryName = isset($_SESSION['categoryName']) ? $_SESSION['categoryName'] : 'Women';

    ?>  <h6 class="heading"><?php echo $categoryName."-".$subCategoryName; ?><br></h6>  <?php
        
        if(empty($this->model->getName($subCategoryName,$categoryName))){?>
          <h4 class="heading"> <?php echo "No data to show"; ?><br></h4>  <?php
        }
        else{
        for($i=0;$i<count($this->model->getName($subCategoryName,$categoryName));$i++){
          $product=$this->model->getName($subCategoryName,$categoryName)[$i];
          
        for($x=0;$x<count($this->model->getColor($subCategoryName,$product->product_id));$x++){
          $color=$this->model->getColor($subCategoryName,$product->product_id)[$x];
    ?>
    <!---------------------------------- SHOP BY GENDER CATEGORY START---------------------------------->
      <div class="card" style="width:300px">
        <?php foreach($this->model->getImage($subCategoryName,$product->product_id) as $image){ ?>
          <a href="<?php echo URLROOT . 'pages/productInfo?product_id='.$product->product_id.'&color_id='.$color->color_id;?>" ><img class="card-img-top" id="myImg" src = "<?php echo ImageRoot."addProduct/".$image->image ; ?>" alt="Card image" ></a>
        <?php } ?>

          <div class="card-body" style="height:auto">
              <h4 class="card-title"><?php echo $product->name;?>                                               </h4> 
              <h4 class="card-text"> <?php echo "Style: ".$this->model->getStyle($subCategoryName)[$i];?>       </h4>
              <h4 class="card-text"> <?php echo "Season: ".$this->model->getSeason($subCategoryName)[$i];?>     </h4>
              <h4 class="card-text"> <?php echo "Neckline: ".$this->model->getNeckline($subCategoryName)[$i];?> </h4>
              <h4 class="card-text"> <?php echo "Material: ".$this->model->getMaterial($subCategoryName)[$i];?> </h4>

              <h4 class="card-text">Colors available:
                <?php foreach($this->model->getColor($subCategoryName,$product->product_id) as $color){ ?>
                  <?php echo $color->colorName." ".$color->color_id.",";?>
                <?php } ?>
              </h4>

              <div class="stars">
                <?php
                  for($x=0;$x<$product->rating;$x++){?>
                      <i class="fas fa-star"></i>
                <?php } ?>
              </div> 

              <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $this->model->getQuantity($subCategoryName)[$i];?> </p>
                <?php if($_SESSION['userType_id']==1){ ?> 
                  <a href="#" class="btn btn-primary">View Product</a>
                <?php }
                    else if($_SESSION['userType_id']==2){ ?> 
                    <a href="#" class="btn btn-primary">Add to cart</a>
                <?php } ?>
              <div id="price"><?php echo"EGP ".$this->model->getPrice($subCategoryName)[$i];?> </div>
          </div>
      </div>
          <?php
      }
    }
  }
      ?>
      <!---------------------------------- SHOP BY GENDER CATEGORY END---------------------------------->
<?php
    }

}