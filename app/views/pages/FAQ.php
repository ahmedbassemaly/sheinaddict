<link rel="stylesheet" href="<?php echo URLROOT . 'css/FAQ.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php

class FAQ extends view
{

  public function output()
  {
    $title = $this->model->title;
    $data = $this->model->data;

    require APPROOT . '/views/inc/header.php';

    $text = <<<EOT

    <div class="box-1">
      <h1 class="display-4"> $title</h1>
      <h4> $data</h4>
    </div>
EOT;
    echo $text;
  
?>

<div class="FAQ-row">
  <div class="col-sm-3">
    <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/shipping?id=1'; ?>">
    <!-- <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/shipping'; ?>"> -->
      <div class="card-body">
          <div class="icons">
            <i class="fas fa-shipping-fast fa-5x"></i>
          </div>
          <h5 class="card-title" id="1">Shipping Policy</h5>
      </div>
    </a>
  </div>
  <div class="col-sm-3">
    <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/measurement?id=2'; ?>" >
    <!-- <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/measurement'; ?>" > -->
      <div class="card-body">
        <img src= "<?php echo ImageRoot . 'size.jpg' ; ?>"/></img>
        <h5 class="card-title" id="2">Measurment Chart</h5>
      </div>
    </a>
  </div>
  <div class="col-sm-3">
    <!-- <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/payment?id=3'; ?>"> -->
    <a class="card stretched-link text-decoration-none" href="<?php echo URLROOT . 'pages/payment'; ?>">
      <div class="card-body">
        <div class="icons">
          <i class="fa fa-money fa-5x"></i>
        </div>
        <h5 class="card-title" id="3">Payment Methods</h5>
      </div>
    </a>
  </div>
</div>

<?php
require APPROOT . '/views/inc/footer.php';
}
}

?>