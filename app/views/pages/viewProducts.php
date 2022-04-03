<link rel="stylesheet" href="<?php echo URLROOT . 'css/viewProducts.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php

class viewProducts extends View{
    public function output()
    {
    //$title = $this->model->title;;
    // require APPROOT . '/views/inc/adminnavbar.php';
    // require APPROOT . '/views/inc/sidebar.php';
    require APPROOT . '/views/inc/header.php';
    
    $this->printForm();
    // require APPROOT . '/views/inc/footer.php';

    }
 
    public function printForm(){
        $getPrice=$this->model->getPrice();
        $getName=$this->model->getName();
        $getQuantity=$this->model->getQuantity();
        $getDescription=$this->model->getDescription();
        $getSubCategory=$this->model->getSubCategory();
        $i=0;
        while($i<12){
        ?>
        <div class="container d-flex justify-content-center mt-50 mb-50">
            <div class="row">
                <div class="col-md-10">

                    <div class="card card-body">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"> <img src = "<?php echo ImageRoot . "category/category-".$i.".png" ; ?>" width="150" height="150" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <?php echo $getName[$i];?>  </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="/pages/category.php" class="text-muted" data-abc="true">Men</a></li>
                                    <li class="list-inline-item"><a href="/pages/subcategory.php" class="text-muted" data-abc="true">Hoodies</a></li>
                                </ul>
                                <h6> <?php echo $getDescription[0];?> </h6>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $getQuantity;?> </li>
                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">Price: <?php echo"$".$getPrice;?></h3>
                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                    <div class="text-muted"></div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Edit Product</button>
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