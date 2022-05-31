
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT . 'css/homePage.css'; ?>">
<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';

?>

<!-- <div class = "center">
   <p>Shein Addict</p>
</div> -->

<div class="row-1">
    <div class="pic-wrapper">
      
        <figure class="pic-1"><img src= "<?php echo ImageRoot . 'my_img_auto_x2 (1).jpg' ; ?>"/></figure>
        <figure class="pic-2"><img src= "<?php echo ImageRoot . 'new_img_auto_x2.jpg' ; ?>"/></figure>
        <figure class="pic-3"><img src= "<?php echo ImageRoot . 'my_img_auto_x2 (3).jpg' ; ?>"/></figure>
        <figure class="pic-4"><img src= "<?php echo ImageRoot . 'clothes.jpg' ; ?>"/></figure>
        
    </div>
 </div>


<div class="container-1">
        <div class="section-title">
            <h1>Discover More</h1>
        </div>

        <div class="row">
    <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src= "<?php echo ImageRoot . 'img1.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a href="#">Women</a></h2>
                            <div class="effect-btn">
                                <a href="<?php echo URLROOT . 'pages/category'; ?>" class="btn"><i class="fa fa-eye" aria-hidden="true"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src="<?php echo ImageRoot . 'img2.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a href="#">Men</a></h2>
                            
                            <div class="effect-btn">
                                <a href="<?php echo URLROOT . 'pages/category'; ?>" class="btn"><i class="fa fa-eye"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src="<?php echo ImageRoot . 'img3.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a href="#">Kids</a></h2>
                            <div class="effect-btn">
                                <a href="<?php echo URLROOT . 'pages/category'; ?>" class="btn"><i class="fa fa-eye"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Products</h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <?php 
            
            ?>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <?php for($i=0;$i<3;$i++){$rand=rand(1,$this->model->getCount());$products=$this->model->getProductRandom($rand);?>
                                <div class="col-md-4 mb-3">
                                    <?php foreach($products as $product){?>
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="<?php echo ImageRoot . "addProduct/".$product->image; ?>">
                                        
                                            <h4 class="card-title"><?php echo $product->name;?></h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Style: ".$product->style;?>       </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Season: ".$product->season;?>     </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Neckline: ".$product->neckline;?> </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Material: ".$product->material;?> </h4>
                                        
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $product->quantity;?> </p>
                                    </div>
                                </div>
                                <?php break;}}?>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <?php for($i=0;$i<3;$i++){$rand=rand(1,$this->model->getCount());$products=$this->model->getProductRandom($rand);?>
                                <div class="col-md-4 mb-3">
                                    <?php foreach($products as $product){?>
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="<?php echo ImageRoot . "addProduct/".$product->image; ?>">
                                        
                                            <h4 class="card-title"><?php echo $product->name;?></h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Style: ".$product->style;?>       </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Season: ".$product->season;?>     </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Neckline: ".$product->neckline;?> </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Material: ".$product->material;?> </h4>
                                        
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $product->quantity;?> </p>
                                    </div>
                                </div>
                                <?php break;}}?>

                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row">
                                <?php for($i=0;$i<3;$i++){$rand=rand(1,$this->model->getCount());$products=$this->model->getProductRandom($rand);?>
                                <div class="col-md-4 mb-3">
                                    <?php foreach($products as $product){?>
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="<?php echo ImageRoot . "addProduct/".$product->image; ?>">
                                        
                                            <h4 class="card-title"><?php echo $product->name;?></h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Style: ".$product->style;?>       </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Season: ".$product->season;?>     </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Neckline: ".$product->neckline;?> </h4>
                                            <h4 class="card-text" style="font-size:13px;color:black;font-style: italic;"> <?php echo "Material: ".$product->material;?> </h4>
                                        
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $product->quantity;?> </p>
                                    </div>
                                </div>
                                <?php break;}}?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
