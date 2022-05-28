<link rel="stylesheet" href="<?php echo URLROOT . 'css/viewProducts.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php

class viewProducts extends View{
    public function output()
    {
    // require APPROOT . '/views/inc/adminnavbar.php';
    require APPROOT . '/views/inc/sidebar.php';
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    //require APPROOT . '/views/inc/footer.php';
    }
 
    public function printForm(){
        $i=1;
        ?>
        <div class="col-md-10">

        <?php $action = URLROOT . '/pages/addProduct'; ?>
        <form method="post" action="<?php echo $action;?>">
            <button type="submit" value="addProduct" name ="submit" id="addProduct">Add Product</button>
        </form>
        <!-- <a href="<?php echo URLROOT . 'pages/addProduct'; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Product</a> -->
        </div>
        <?php
        while($i<=$this->model->getNum()){
        ?>
        <div class="container d-flex justify-content-center mt-10 mb-10">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-body">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">  <?php
                                foreach($this->model->getImage($i) as $image){ ?>
                                <img class="card-img-top" id="myImg" alt="image not found" src = "<?php echo ImageRoot . "addProduct/".$image->image; ?>" alt="Card image" width="150" height="150">
                                <?php }?> 
                            </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <?php echo $this->model->getName($i);?>  </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <?php if ($this->model->getCategoryName($i)=="Men"){?>
                                    <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Men'; ?>" class="text-muted" data-abc="true"><?php echo $this->model->getCategoryName($i);?></a></li>
                                    <?php }
                                    else if($this->model->getCategoryName($i)=="Women"){?>
                                    <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Women'; ?>" class="text-muted" data-abc="true"><?php echo $this->model->getCategoryName($i);?></a></li>
                                    <?php }
                                    else if($this->model->getCategoryName($i)=="Kids"){?>
                                        <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Kids'; ?>" class="text-muted" data-abc="true"><?php echo $this->model->getCategoryName($i);?></a></li>
                                        <?php }?>
                                    <li class="list-inline-item"><?php echo $this->model->getSubCategory($i); ?></li>
                                </ul>
                                <h6> <?php echo "Style: ". $this->model->getStyle($i);?></h6><h6> <?php echo "Neckline: ".$this->model->getNeckline($i);?></h6><h6><?php echo "Material: ".$this->model->getMaterial($i);?></h6><h6><?php echo "Season: ".$this->model->getSeason($i);?></h6>
                                    
                                    
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $this->model->getQuantity($i);?> </li>
                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">Price: <?php echo"EGP ".$this->model->getPrice($i);?></h3>
                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                    <!-- <div class="text-muted"></div> <button type="button" class="btn1 btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i><a href="<?php echo URLROOT . 'pages/editProduct'; ?>"> Edit Product</a></button> -->
                                    <?php $action1 = URLROOT . '/pages/editProduct'; ?>
                                    <form method="post" action="<?php echo $action1;?>">
                                        <button type="submit" value="editProduct" name ="submit" id="editProduct">Edit Product</button>
                                    </form>
                            
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php $i++; 
        
        }
    }
}
?>