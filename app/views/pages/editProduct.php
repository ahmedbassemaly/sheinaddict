<!-- To fix search bar in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E</script>"></script>
<?php
  
  class editProduct extends View{
    public function output(){
        //$title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        $this->printForm();
        require APPROOT . '/views/inc/footer.php';
    }

    public function printForm(){
        $productID=$_GET['product_id'];
        // $colorName=$_GET['colorName'];
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/product.css'; ?>">
        
        <form action="" method="POST" enctype='multipart/form-data'>
        <div class="card" >
        <div id="centerEditForm">
            <div class="row">
                <h1 class="card-title" style="text-align: center" id="title1">Edit Product</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label>Name:<br></label>
                    <input type="text" name='name' id="name" class="form-control" value="<?php echo $this->model->getName($productID);?>">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6" id=margin-bottom>
                    <label>Price:</label>
                    <input type="text" name='price' id="price" class="form-control" value="<?php echo $this->model->getPrice($productID);?>">
                </div>
                <div class="col-lg-6" id=margin-bottom>
                    <label>Quantity:</label>
                    <input type="text" name='quantity' id="quantity" class="form-control" value="<?php echo $this->model->getQuantity($productID);?>">  
                </div>               
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label>Category:</label>
                </div>
                <div class="col-lg-6">
                    <input type="radio" id="category" name="categoryName" value="Women" <?php echo ($this->model->getCategoryName($productID)=='Women')?'checked':'' ?>>
                    <label for="Women">Women</label>
                    <input type="radio" id="category" name="categoryName" value="Men" <?php echo ($this->model->getCategoryName($productID)=='Men')?'checked':'' ?>>
                    <label for="Men">Men</label>
                    <input type="radio" id="category" name="categoryName" value="Kids" <?php echo ($this->model->getCategoryName($productID)=='Kids')?'checked':'' ?>>
                    <label for="Kids">Kids</label>
                </div>
            </div><br>
            
            <div class="row">
                <div class="col-lg-3">
                    <label for="subcategory">Choose a subcategory: 
                </div>
                <div class="col-lg-3">
                    <select name="subcategory" id="subcategory">
                    <script>
                        $('#myform input[type=radio]').on('change', function(event) {
                        var result = $(this).val();
                        $('#result').html(result);
                    })
                    </script>
                        <option value="<?php echo $this->model->getSubCategory($productID);?>"><?php echo $this->model->getSubCategory($productID);?></option>
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Hoodies & Sweatshirts">Hoodies & Sweatshirts</option>
                        <option value="Jackets">Jackets</option>
                        <option value="Co-ords">Co-ords</option>
                        <option value="Bottoms">Bottoms</option>
                        <option value="Shoes">Shoes</option>
                        <option value="Dresses">Dresses</option>
                        <option value="Blouses">Blouses</option>
                    </select></label>
                </div>
            </div><br>
            
            

            <div class="row">
                <div class="col-lg-6">
                    <label>Description: </label>
                </div>
            </div><br>

            <div class="row">
                <div class="col-lg-3">
                    <label> Style:</label>
                </div>
                <div class="col-lg-3">
                    <input type="text" name='style' id="style" class="form-control" value="<?php echo $this->model->getStyle($productID);?>">
                </div>
                <div class="col-lg-3">
                    <label for="season">Season: 
                </div>
                <div class="col-lg-3">
                    <select name="season" id="season" value="<?php echo $this->model->getSeason($productID);?>">
                        <option value="Summer">Summer</option>
                        <option value="Fall">Fall</option>
                        <option value="Winter">Winter</option>
                        <option value="Spring">Spring</option>
                    </select></label>
                </div>
            </div><br>

            <div class="row">
                <div class="col-lg-3">
                    <label for="neckline">Neckline:
                </div>
                <div class="col-lg-3">
                    <select name="neckline" id="neckline" value="<?php echo $this->model->getNeckline($productID);?>">
                        <option value="round">Round</option>
                        <option value="v-neck">V-Neck</option>
                        <option value="turtleneck">Turtleneck</option>
                        <option value="collared">Collared</option>
                        <option value="off-shoulder">Off-Shoulder</option>
                        <option value="sweetheart">Sweetheart</option>
                        <option value="strapless">Strapless</option>
                        <option value="square">Square</option>
                    </select></label>
                </div>
                <div class="col-lg-3">
                    <label for="material">Material:
                </div>
                <div class="col-lg-3">
                    <select name="material" id="material" value="<?php echo $this->model->getMaterial($productID);?>">
                        <option value="cotton">Cotton</option>
                        <option value="chiffon">Chiffon</option>
                        <option value="silk">Silk</option>
                        <option value="satin">Satin</option>
                        <option value="woven">Woven</option>
                        <option value="knitted">Knitted</option>
                        <option value="denim">Denim</option>
                        <option value="lace">Lace</option>
                        <option value="leather">Leather</option>
                        <option value="velvet">Velvet</option>
                        <option value="crepe">Crepe</option>
                    </select></label>
                </div>
            </div><br><br>

            <div class="row">
                <div class="col-lg-3">
                    <label for="color">Color:
                </div>
                <div class="col-lg-9"> 
                    <!-- <?php
                    for($i=0; $i<$this->model->getAllColors(); $i++){
                        ?>
                        <input type="checkbox" id="<?php $this->model->getColor($i)?>" name="color[]" 
                        value="<?php $this->model->getColor($i)?>" <?php echo ($this->model->getColor($productID)[$i])?'checked': ''?>>
                        
                        <label for="<?php $this->model->getColor($i)?>"> <?php $this->model->getColor($productID)[$i]?></label>&nbsp
                        <?php
                    }
                    ?> -->

                    <input type="checkbox" id="Black" name="color[]" value="Black" >
                    <label for="Black"> Black</label>&nbsp                   
                    <input type="checkbox" id="White" name="color[]" value="White" >
                    <label for="white"> White</label>&nbsp
                    <input type="checkbox" id="Blue" name="color[]" value="Blue">
                    <label for="blue"> Blue</label>&nbsp
                    <input type="checkbox" id="Red" name="color[]" value="Red">
                    <label for="red"> Red</label>&nbsp
                    <input type="checkbox" id="Beige" name="color[]" value="Beige">
                    <label for="beige"> Beige</label>&nbsp
                    <input type="checkbox" id="Pink" name="color[]" value="Pink">
                    <label for="pink"> Pink</label>&nbsp
                    <input type="checkbox" id="Green" name="color[]" value="Green">
                    <label for="green"> Green</label>&nbsp
                    <input type="checkbox" id="Grey" name="color[]" value="Grey">
                    <label for="grey"> Grey</label>&nbsp
                    <input type="checkbox" id="Yellow" name="color[]" value="Yellow">
                    <label for="yellow"> Yellow</label>&nbsp
                    <input type="checkbox" id="Purple" name="color[]" value="Purple">
                    <label for="purple"> Purple</label>&nbsp
                    <input type="checkbox" id="Orange" name="color[]" value="Orange">
                    <label for="orange"> Orange</label>&nbsp
                    <input type="checkbox" id="Maroon" name="color[]" value="Maroon">
                    <label for="mahogany"> Maroon</label>&nbsp
                    <input type="checkbox" id="Brown" name="color[]" value="Brown">
                    <label for="brown"> Brown</label>&nbsp
                    <input type="checkbox" id="Teal" name="color[]" value="Teal">
                    <label for="teal"> Teal</label>
                </label></div> 
            </div><br>

            <div id="colorForm"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label> Delete this Product:
                </div>
                <div class="col-lg-3">
                <li class="list-inline-item">
                    <button class="btn btn-danger btn-md" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                </li>
                </div> 
            </div>                              
            <div class="row">
                <button type="submit" value="" name ="submit" id="submit">Submit Changes</button>
            </div>
            
        </div>
    </div>
    </form>
    

        
    <script>
        /******************************Colors******************************/
        myString="";
        var images=[];
        //`+$(this).val()+
        $('input[type="checkbox"]').change(function(){
            var checks = $('input[type="checkbox"]:checked').map(function() {
                myString+=`<div class='row'>
                            <div class='col-lg-6' id=margin-bottom>
                                <div class='row'>
                                    <div class='col-lg-3'>
                                        <label for='images'><h4> `+$(this).attr('id')+` </h4>
                                    </div>
                                    <div class='col-lg-9'>
                                    <label id='fileUpload'> <input type='file' name="fileToUpload`+$(this).attr('id')+`[]" multiple='multiple'> </label>
                                        
                                    </div>
                                </div> 
                            </div>               
                        </div>`
            }).get()
            $('#colorForm').html(myString);
            myString="";
        })
        function colorForm(color){}
        /******************************Colors******************************/
    </script>
    
        
    <?php
    }
}
?>