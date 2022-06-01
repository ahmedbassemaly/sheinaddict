<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

class search extends view{
    public function output(){
        ?><link rel="stylesheet" href="<?php echo URLROOT . 'css/search.css'; ?>"><?php
        require APPROOT . '/views/inc/header.php';

        $searchKey=$_POST['searchright'];
        $result=$this->model->getSearchProduct($searchKey);?>
        <h1 class="heading" style="margin-top:5%;margin-bottom:2%;">Search results for <?php echo "' ".$searchKey." '";?></h1>
        <?php
        
        // echo $searchKey;
        if(empty($result)){
            echo "<h2>No results Found</h2>";
        }else{
            foreach($result as $product){
                //$color=$this->model->getColor($product->product_id);
            ?>
            <!---------------------------------- SHOP BY GENDER CATEGORY START---------------------------------->
              <div class="card" style="width:300px">
                <img class="card-img-top" id="myImg" alt="image not found" src = "<?php echo ImageRoot . "addProduct/".$product->image; ?>" >
                
                  <div class="card-body">
                    <h4 class="card-title"> <?php echo $product->name;?> </h4>
                    <h4 class="card-text"> <?php echo "Style: ".$product->style;?>       </h4>
                        <h4 class="card-text"> <?php echo "Season: ".$product->season;?>     </h4>
                        <h4 class="card-text"> <?php echo "Neckline: ".$product->neckline;?> </h4>
                        <h4 class="card-text"> <?php echo "Material: ".$product->material;?> </h4>
                    
                      <div class="stars">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star-half-alt"></i>
                      </div>
                      <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $product->quantity;?> </p>
          
                      <?php if(empty($_SESSION['userType_id'])){
                      ?> <a href="<?php echo URLROOT . '/users/Register'; ?>" class="btn btn-primary">View Product</a>
                      <?php } 
                       else if($_SESSION['userType_id']==1){ 
                      ?> <a href="<?php echo URLROOT . '/pages/editProduct'; ?>" class="btn btn-primary">Edit Product</a>
                      <?php } ?>
          
                      <div id="price"><?php echo"EGP ".$product->price;?> </div>
                  </div>
              </div>
                  <?php
              }
        }

        // require APPROOT . '/views/inc/footer.php';
    }
}

?>