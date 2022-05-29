<link rel="stylesheet" href="<?php echo URLROOT . 'css/cart.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
<?php
class cart extends view
{
    public function output(){
        require APPROOT . '/views/inc/header.php';
    
?>
<div class="container ">
    <!-- <div class="row d-flex justify-content-center align-items-center"> -->
    <div class="row">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>

      <?php 
      
      $cart=$this->model->getProductName($_SESSION['user_id']);
      $userID=$_SESSION['user_id'];

      for($i=0; $i<count($cart); $i++){
        ?>
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="<?php echo ImageRoot . 'top.jpg' ; ?>">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $cart[$i]; ?></p>
                <p class="lead">Size: M <br>Color: <?php echo $this->model->getProductColor($_SESSION['user_id'])[$i]; ?></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="2" type="number"
                  class="form-control form-control-sm" />

                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">$499.00</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a class="cart" href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
<?php } ?>

        <div class="card">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discount code</label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
                <p class="lead">Total: 1000</p>
                <div class="dropdown" col-md-6 text-center>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  choose country
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="javascript:void(false);">Egypt</a></li>
                  <li><a class="dropdown-item" href="javascript:void(false);">Saudi Arabia</a></li>
                </ul>
              </div>
            </div>
            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
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