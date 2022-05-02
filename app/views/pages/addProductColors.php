<!-- To fix search bar in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E</script>"></script>
<?php
  
  class addProductColors extends View{
    public function output(){
        //$title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        $this->printForm();
        require APPROOT . '/views/inc/footer.php';
    }

    public function printForm(){
        $action = URLROOT . '/pages/viewProducts';
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/product.css'; ?>">
        <form action="<?php echo $action;?>" method="POST">

        <div class="card" >
        <div id="centerEditForm">
            <div class="row">
                <h1 class="card-title" style="text-align: center" id="title1">Add Images</h1>
            </div>

            <?php
            if(!empty($_POST['color'])) {
                foreach($_POST['color'] as $check) {?>
                    <div class="row">
                    <div class="col-lg-6" id=margin-bottom>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="images"><h4><?php echo $check ?></h4>
                            </div>
                            <div class="col-lg-9">
                                <label id="fileUpload"> <input type="file" name="fileToUpload" multiple> </label>
                                <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                            </div>
                        </div> 
                    </div>               
                </div> <hr><br>
                <?php   
                }
            }
            ?>
            
            <div class="row">
               <button type="submit" name ="submit" id="submit">Add Product</button>
            </div>
        </div>
        </div>
        </form>
        
    <?php
    }
}
?>