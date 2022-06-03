<?php
class viewProductsModel extends Model{
    protected $product_id;
    protected $productName;
    protected $productPrice;
    protected $category;
    protected $quantity;
    protected $subCategory;   
    protected $rating;

    public function __construct(){
        parent::__construct();
        $productName="";
        $categrory="";
        $productPrice="";
        $quantity="";
        $subCategory="";
        $rating="";
    }
    public function getProductId($id){
        $this->dbh->query("SELECT product_id FROM products WHERE `product_id`=:productId");
        $this->dbh->bind(':productId',$id);
        return $this->dbh->single()->product_id;
    }
    public function getProducts($key=""){
        if($key==""){
            $this->dbh->query("SELECT p.product_id,p.name,p.price,p.quantity,p.categoryName,p.subCategory, i.image, d.style,d.neckline,d.season,d.material FROM products p, image i, description d  WHERE p.product_id=i.product_id AND p.product_id = d.product_id AND i.image LIKE '%Front%'");
        }else{
            $this->dbh->query("SELECT p.product_id, p.name,p.price,p.quantity,p.categoryName,p.subCategory, i.image, d.style,d.neckline,d.season,d.material FROM products p, image i, description d  WHERE p.product_id=i.product_id AND p.product_id = d.product_id AND i.image LIKE '%Front%' AND p.name LIKE '%".$key."%'");
        }
        $result=$this->dbh->resultSet();
        foreach($result as $product){
        ?>
        <div class="container d-flex justify-content-center mt-10 mb-10">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-body">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">  
                                <img class="card-img-top" id="myImg" alt="image not found" src = "<?php echo ImageRoot . "addProduct/".$product->image; ?>" alt="Card image" width="150" height="150">
                                
                            </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <?php echo $product->name; 
                                                                                $productId=$product->product_id;?>  </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <?php if ($product->categoryName=="Men"){?>
                                    <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Men'; ?>" class="text-muted" data-abc="true"><?php echo $product->categoryName;?></a></li>
                                    <?php }
                                    else if($product->categoryName=="Women"){?>
                                    <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Women'; ?>" class="text-muted" data-abc="true"><?php echo $product->categoryName;?></a></li>
                                    <?php }
                                    else if($product->categoryName=="Kids"){?>
                                        <li class="list-inline-item"><a href="<?php echo URLROOT . 'pages/category?categoryName=Kids'; ?>" class="text-muted" data-abc="true"><?php echo $product->categoryName;?></a></li>
                                        <?php }?>
                                    <li class="list-inline-item"><?php echo $product->subCategory; ?></li>
                                </ul>
                                <h6> <?php echo "Style: ". $product->style;?></h6><h6> <?php echo "Neckline: ".$product->neckline;?></h6><h6><?php echo "Material: ".$product->material;?></h6><h6><?php echo "Season: ".$product->season;?></h6>
                                    
                                    
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="quantity" style="font-size:13px;color:black;font-style: italic;">Quantity: <?php echo $product->quantity;?> </li>
                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">Price: <?php echo"EGP ".$product->price;?></h3>
                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                    <!-- <div class="text-muted"></div> <button type="button" class="btn1 btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i>
                                    <a href="<?php echo URLROOT . 'pages/editProduct?product_id='.$productId;?>"> Edit Product</a></button> -->
                                    
                                    <!-- <form method="post" >
                                        <button type="submit" value="editProduct" name ="submit" id="editProduct" href="<?php echo URLROOT . 'pages/editProduct?product_id='.$productId;?>">Edit Product</button>
                                    </form> -->
                                   
                                        <input type="button" id="editProduct" onclick="location.href='<?php echo URLROOT . 'pages/editProduct?product_id='.$productId;?>';" value="Edit Product" />
                                   
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        
        }
    }
    public function getNum(){
        $this->dbh->query("SELECT * FROM products");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }
    
 }
?>