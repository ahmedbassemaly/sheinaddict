<link rel="stylesheet" href="<?php echo URLROOT . 'css/cart.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
<?php
class cart extends view
{
    public function output(){
        require APPROOT . '/views/inc/header.php';
    echo "<br><br><br>";
?>
<div class="container ">
    <!-- <div class="row d-flex justify-content-center align-items-center"> -->
    <div class="row">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>

      <?php 
      if(count($this->model->getNumberOfCartItems($_SESSION['user_id']))<1){
        ?>
        <div class="text-center fixed-top" style="margin-top:80px;">  
                      <button class="btn btn-danger" style="width:40%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Cart is Empty!</button>
                    </div>
      <?php
      }
      else{
      $cart = $this->model->getProductName($_SESSION['user_id']);
      $userID = $_SESSION['user_id'];
      $price = $this->model->getProductPrice($_SESSION['user_id']);
      $sum = 0;
      for($i=0; $i<count($cart); $i++){
        ?>
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
              <?php 
              // echo $this->model->getProductImage()[$i]; 
              $productID = $this->model->getProductID($_SESSION['user_id']);
              $color = $this->model->getProductColor($_SESSION['user_id']);
              $color_id = $this->model->colorID($_SESSION['user_id'],$productID[$i]);
               ?>
                <img src="<?php echo ImageRoot ."addProduct/". $this->model->getProductImage($productID[$i], $color[$i])[0] ; ?>">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $cart[$i]; ?></p>
                <p class="lead">Size: <?php echo $this->model->getSize($_SESSION['user_id'])[$i]?> <br>Color: <?php echo $this->model->getProductColor($_SESSION['user_id'])[$i]; ?></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
              <?php

                $quantity = 1;
                $cartdetailsID = $this->model->getNumberOfCartItems($_SESSION['user_id']);  
                ?>
                <a href="javascript:" id="minus2" onclick="decrementValue(<?php echo $i ?>)"/><strong>-</strong></a>
                <input type="text" id="qty<?php echo $i?>" name="quan<?php echo $i?>" min="1" value="<?php echo $quantity; ?>">
                <a href="javascript:" id="add2" onclick="incrementValue(<?php echo $i ?>)"/><strong>+</strong></a>
                <script type="text/javascript">
                  
                function decrementValue(i){         
                  var qty2 = document.getElementById("qty"+i);
                    if(!isNaN(qty2.value) && qty2.value > 0 ) {

                      qty2.value--;

                    }
                }

                function incrementValue(i){
                   var qty2 = document.getElementById("qty"+i);
                    if(!isNaN(qty2.value)) {

                      qty2.value++;

                    }
                }

                </script>

              </div>
              <?php echo $quantity ?>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $this->model->getProductPrice($_SESSION['user_id'])[$i] ?> EGP</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a class="cart" href="<?php echo URLROOT . 'pages/cart?product_id='.$productID[$i].'&color_id='.$color_id[0] ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
<?php
  $sum += $price[$i];
  } 
}
?>

        <div class="card">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discount code</label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div>

        <?php
        if(count($this->model->getNumberOfCartItems($_SESSION['user_id']))<1){
          $sum=0;
        }
        ?>
        <div class="card">
          <div class="card-body">
            <?php if(isset($_GET['country'])=='Egypt'){?>
                <p class="lead">Total: <?php echo $sum ?> EGP</p>
                <?php }
                else{
                  ?>
                  <p class="lead">Total: <?php echo $sum*10?> EGP</p>
                  <?php
                }
                ?>
                <div class="dropdown" col-md-6 text-center>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  choose country
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href=<?php echo URLROOT."pages/cart?country=Egypt"?>>2 weeks</a></li>
                  <li><a class="dropdown-item" href=<?php echo URLROOT."pages/cart?country=Saudi%20Arabia"?>> 1 month</a></li>
                  <!-- javascript:void(false); -->
                </ul>
              </div>
            </div>

            <form action="" method="POST">
             <button type="submit" class="btn btn-warning btn-block btn-lg" name="placeOrder" value="Order Now">Place Order</button>
            </form>
        </div>
        
      </div>
    </div>
</div>

  
  <?php
    require APPROOT . '/views/inc/footer.php';
//  }
}
}
?>

<script>
$(document).on('click', '.dropdown-item', function(event) {
  // event.preventDefault();
  // $(this).toggleClass('dropdown-item-checked');
  var t = $(this);
    var ul = t.closest('ul.dropdown-menu');
    var selected = t.hasClass('dropdown-item-checked');
    ul.find('li a').removeClass('dropdown-item-checked');
    if (!selected)
        t.addClass('dropdown-item-checked');
});
</script>