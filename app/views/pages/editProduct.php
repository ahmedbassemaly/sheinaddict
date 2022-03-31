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
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/product.css'; ?>">
            
        <div class="card" >
        <div id="centerEditForm">
            <div class="row">
                <h1 class="card-title" style="text-align: center" id="title1">Edit Product</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label>Name:<br></label>
                    <input type="text" name='name' id="name" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6" id=margin-bottom>
                    <label>Price:</label>
                    <input type="text" name='price' id="price" class="form-control" required>
                </div>
                <div class="col-lg-6" id=margin-bottom>
                    <label>Quantity:</label>
                    <input type="text" name='quantity' id="quantity" class="form-control" required>  
                </div>               
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label>Category:</label>
                </div>
                <div class="col-lg-6">
                    <input type="radio" id="category" value="Women">
                    <label for="Women">Women</label>
                    <input type="radio" id="category" value="Men">
                    <label for="Men">Men</label>
                    <input type="radio" id="category" value="Kids">
                    <label for="Kids">Kids</label>
                </div>
            </div><br>
            
            <div class="row">
                <div class="col-lg-3">
                    <label for="subcategory">Choose a subcategory: 
                </div>
                <div class="col-lg-3">
                    <select name="subcategory" id="subcategory">
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Pants">Pants</option>
                        <option value="Dresses">Dresses</option>
                        <option value="Blouses">Blouses</option>
                        <option value="Jackets">Jackets and Blazers</option>
                        <option value="Activewear">Activewear</option>
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
                    <input type="text" name='style' id="style" class="form-control">
                </div>
                <div class="col-lg-3">
                    <label for="season">Season: 
                </div>
                <div class="col-lg-3">
                    <select name="season" id="season">
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
                    <select name="neckline" id="neckline">
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
                    <select name="material" id="material">
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
            </div><br>
               
            <div class="row">
                <div class="col-lg-3">
                    <label for="images">Add Images to Product:
                </div>
                <div class="col-lg-3">
                    <label id="fileUpload"> <input type="file" name="fileToUpload"> </label>
                    <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                </div>
            </div><br> 

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
               <button type="submit" name ="submit" id="submit">Submit Changes</button>
            </div>
        </div>
    </div>
    
        
    <?php
    }
}
?>