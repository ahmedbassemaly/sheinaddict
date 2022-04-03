<!-- To fix search bar in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E</script>"></script>
<?php
  
  class addProduct extends View{
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
                <h1 class="card-title" style="text-align: center" id="title1">Add Product</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label>Name:<br></label>
                    <input type="text" name='name' id="name" placeholder="Product name" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6" id=margin-bottom>
                    <label>Price:</label>
                    <input type="text" name='price' id="price" placeholder="EGP" class="form-control" required>
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
                    <input type='radio' name="category" value="Women" checked>
                    <label for="Women">Women</label>
                    <input type='radio' name="category" value="Men">
                    <label for="Men">Men</label>
                    <input type='radio' name="category" value="Kids">
                    <label for="Kids">Kids</label>
                </div>
            </div><br>
            
            <div class="row">
                <div class="col-lg-3">
                    <label for="subcategory">Choose a subcategory: 
                </div>
                <div class="col-lg-3">
                    <select name="subcategory" id="subcategory">
                        <option value="T-Shirt">T-Shirts</option>
                        <option value="Pants">Bottoms</option>
                        <option value="Dresses">Dresses</option>
                        <option value="Blouses">Blouses</option>
                        <option value="Jackets">Hoodies & Sweatshirts</option>
                        <option value="Activewear">Jackets</option>
                        <option value="Activewear">Shoes</option>
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
                    <input type="text" name='style' id="style" placeholder="style" class="form-control">
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
            </div><br><br>

            <div class="row">
                <div class="col-lg-3">
                    <label for="color">Color:
                </div>
                <div class="col-lg-9">
                    <input type="checkbox" id="color" name="black" value="Black">
                    <label for="black"> Black</label>&nbsp
                    <input type="checkbox" id="color" name="white" value="White">
                    <label for="white"> White</label>&nbsp
                    <input type="checkbox" id="color" name="blue" value="Blue">
                    <label for="red"> Blue</label>&nbsp
                    <input type="checkbox" id="color" name="red" value="Red">
                    <label for="red"> Red</label>&nbsp
                    <input type="checkbox" id="color" name="beige" value="Beige">
                    <label for="red"> Beige</label>&nbsp
                    <input type="checkbox" id="color" name="pink" value="Pink">
                    <label for="red"> Pink</label>&nbsp
                    <input type="checkbox" id="color" name="green" value="Green">
                    <label for="red"> Green</label>&nbsp
                    <input type="checkbox" id="color" name="grey" value="Grey">
                    <label for="red"> Grey</label>&nbsp
                    <input type="checkbox" id="color" name="yellow" value="Yellow">
                    <label for="red"> Yellow</label>&nbsp
                    <input type="checkbox" id="color" name="purple" value="Purple">
                    <label for="red"> Purple</label>&nbsp
                    <input type="checkbox" id="color" name="orange" value="Orange">
                    <label for="red"> Orange</label>&nbsp
                    <input type="checkbox" id="color" name="mahogany" value="Mahogany">
                    <label for="red"> Mahogany</label>&nbsp
                    <input type="checkbox" id="color" name="brown" value="Brown">
                    <label for="red"> Brown</label>&nbsp
                    <input type="checkbox" id="color" name="teal" value="Teal">
                    <label for="red"> Teal</label>
                </label></div>
            </div><br>

            <div class="row">
                <div class="col-lg-6">
                    <label for="images">Add Images to this Product:
                </div>
                <div class="col-lg-6">
                    <label id="fileUpload"> <input type="file" name="fileToUpload"> </label>
                    <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                </div>
            </div> 

            <div class="row">
               <button type="submit" name ="submit" id="submit">Add Product</button>
            </div>
        </div>
    </div>
    
        
    <?php
    }
}
?>