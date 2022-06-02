<?php
class Pages extends Controller
{

    public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/about.php';
        require_once $viewPath;
        $aboutView = new About($this->getModel(), $this);
        $aboutView->output();
    }

    public function editProfile()
    {
        $editProfile = $this->getModel();
        // echo$_SERVER['REQUEST_METHOD'];
        // var_dump($_SERVER['REQUEST_METHOD']);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            $editProfile->setFname($_POST['Fname']); 
            $editProfile->setLname($_POST['Lname']);
            $editProfile->setEmail($_POST['Email']);
            $editProfile->setPhoneNo($_POST['PhoneNo']);
            $editProfile->setAddress($_POST['Address']);

            if($editProfile->filterEmail($_POST['Email'])==false){
                
                ?>
                    <div class="text-center fixed-top" style="margin-top:500px;">  
                      <button class="btn btn-danger" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Email  is invalid, please enter a valid email</button>
                    </div>
                <?php
            }
            if($editProfile->phoneValidation($_POST['PhoneNo'])==false){
                ?>
                    <div class="text-center fixed-top" style="margin-top:620px;">  
                      <button class="btn btn-danger" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Phone Number  is invalid, please enter a valid phone number</button>
                    </div>
                <?php
            }
            if($editProfile->filterEmail($_POST['Email'])==true && $editProfile->phoneValidation($_POST['PhoneNo'])==true){
                ?>
                    <div class="text-center fixed-top" style="margin-top:630px;">  
                      <button class="btn btn-success" id="Db" style="width:50%"><i aria-hidden="true"></i> Data updated successfully</button>
                    </div>
                <?php
                $result=$editProfile->editUserData($_SESSION['user_id']);
            }
        }

        $viewPath = VIEWS_PATH . 'pages/editProfile.php';
        require_once $viewPath;
        $editProfileView = new editProfile($this->getModel(), $this);
        $editProfileView->output();
    }

    public function FAQ()
    {
        $viewPath = VIEWS_PATH . 'pages/FAQ.php';
        require_once $viewPath;
        $FAQView = new FAQ($this->getModel(), $this);
        $FAQView->output();
    }    

    public function editFAQ(){
        $editFAQ=$this->getModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id=$_POST['submit'];
            // $helpText="helpText{$id}";
            // $editFAQ->setHelpText($_POST[$helpText]);
            $result=$editFAQ->editFAQ($_POST['submit']);
        }

        $viewPath = VIEWS_PATH . 'pages/editFAQ.php';
        require_once $viewPath;
        $editFAQView = new editFAQ($this->getModel(), $this);
        $editFAQView->output();
    }

    public function adminDashboard(){
        $viewPath = VIEWS_PATH . 'pages/adminDashboard.php';
        require_once $viewPath;
        $adminDashboardView = new adminDashboard($this->getModel(), $this);
        $adminDashboardView->output();
    }

    public function ViewProfile(){
        $viewPath = VIEWS_PATH . 'pages/ViewProfile.php';
        require_once $viewPath;
        $viewProfileView = new ViewProfile($this->getModel(), $this);
        $viewProfileView->output();
    }

    public function addProduct()
    {
        if(isset($_POST['addProduct'])){
            $addProduct=$this->getModel();
            $addProduct->setName($_POST['name']);
            $addProduct->setPrice($_POST['price']);
            $addProduct->setQuantity($_POST['quantity']);
            $addProduct->setCategoryName($_POST['category']);
            $addProduct->setsubCategory($_POST['subcategory']);
            $addProduct->setStyle($_POST['style']);
            $addProduct->setSeason($_POST['season']);
            $addProduct->setNeckline($_POST['neckline']);
            $addProduct->setMaterial($_POST['material']);
            $addProduct->setColor($_POST['color']);
            $addProduct->setImages($_FILES);

            /***********************************IMAGES***********************************/
            $root = $_SERVER['DOCUMENT_ROOT']. "/sheinaddict/app/views/images/addProduct/";
            $result=$addProduct->insertProduct();
            
            if(!empty($_POST['color'])) {
                foreach($_POST['color'] as $value){
                    $newImageName=array();
            $d=0;
                    //echo "Chosen color : ".$value.'<br/>';
                        for($i=0;$i<count($_FILES['fileToUpload'.$value]['name']);$i++){
                            $productid=$addProduct->getID();
                            $fileName1=$root.basename($_FILES['fileToUpload'.$value]['name'][$i]);
                            //$imageFileType=strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
                            $file_name =$_FILES['fileToUpload'.$value]['name'][$i];
                            $newImageName[$d]=$productid."_".$value."_".$file_name;
                            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['fileToUpload'.$value]['tmp_name'][$i],$root.basename($newImageName[$d]));
                            $d++;
                            //echo "Chosen image : ".$_FILES['fileToUpload'.$value]['name'][$i].'<br/>';
                        }
                        $result=$addProduct->insertImages($newImageName,$value);

                    }
                }
            /***********************************IMAGES***********************************/
            ?>
            
            <!-- <script>alert('<?php// echo $productid ?>') </script> -->
            <?php
            
        }

        $viewPath = VIEWS_PATH . 'pages/addProduct.php';
        require_once $viewPath;
        $addProductView = new addProduct($this->getModel(), $this);
        $addProductView->output();
    }

    public function editProduct()
    {
        $editProduct=$this->getModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $editProduct->setName($_POST['name']);
            $editProduct->setPrice($_POST['price']);
            $editProduct->setQuantity($_POST['quantity']);
            $editProduct->setCategoryName($_POST['categoryName']);
            $editProduct->setSubCategory($_POST['subcategory']);

            $editProduct->setStyle($_POST['style']);
            $editProduct->setSeason($_POST['season']);
            $editProduct->setNeckline($_POST['neckline']);
            $editProduct->setMaterial($_POST['material']);

            //$editProduct->setColor($_POST['color']);

           // $root = $_SERVER['DOCUMENT_ROOT']. "/sheinaddict/app/views/images/editProduct/";
            // if(!empty($_POST['color'])) {
            //     foreach($_POST['color'] as $value){
            //         //echo "Chosen color : ".$value.'<br/>';
            //             for($i=0;$i<count($_FILES['fileToUpload'.$value]['name']);$i++){
            //                 $fileName1=$root.basename($_FILES['fileToUpload'.$value]['name'][$i]);
            //                 $file_name = $_FILES['fileToUpload'.$value]['name'][$i];
            //                 $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            //                 move_uploaded_file($_FILES['fileToUpload'.$value]['tmp_name'][$i],$fileName1);
            //                 //echo "Chosen image : ".$_FILES['fileToUpload'.$value]['name'][$i].'<br/>';
            //             }
            //         }
            //     }

            // if(!empty($_POST['color'])) {
            //     foreach($_POST['color'] as $value){
            //         $newImageName=array();
            // $d=0;
            //         //echo "Chosen color : ".$value.'<br/>';
            //             for($i=0;$i<count($_FILES['fileToUpload'.$value]['name']);$i++){
            //                 $productid=$addProduct->getID();
            //                 $fileName1=$root.basename($_FILES['fileToUpload'.$value]['name'][$i]);
            //                 //$imageFileType=strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
            //                 $file_name =$FILES['fileToUpload'.$value]['name'][$i];
            //                 $newImageName[$d]=$productid."".$value."_".$file_name;
            //                 $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            //                 move_uploaded_file($_FILES['fileToUpload'.$value]['tmp_name'][$i],$root.basename($newImageName[$d]));
            //                 $d++;
            //                 //echo "Chosen image : ".$_FILES['fileToUpload'.$value]['name'][$i].'<br/>';
            //             }
            //             $result=$addProduct->insertImages($newImageName,$value);

            //         }
            //     }
            
            for($i=0; $i<count($this->model->getColor($_GET['product_id'])); $i++){
                $result=$editProduct->editProduct($_GET['product_id']);
            }
            
            // $resul2=$editProduct->updateDesc($_POST);
        }
        

        $viewPath = VIEWS_PATH . 'pages/editProduct.php';
        require_once $viewPath;
        $editProductView = new editProduct($this->getModel(), $this);
        $editProductView->output();
    }
    
    public function category()
    {
        $viewPath = VIEWS_PATH . 'pages/category.php';
        require_once $viewPath;
        $categoryView = new category($this->getModel(), $this);
        $categoryView->output();
    }

    public function orders()
    {
        $viewPath = VIEWS_PATH . 'pages/orders.php';
        require_once $viewPath;
        $ordersView = new orders($this->getModel(), $this);
        $ordersView->output();
    }

    public function subCategory()
    {
        $subCategory=$this->getModel();
        // $subCategoryName=$_GET['subCategoryName'];
        // $categoryName = $_SESSION['categoryName'];
        // $get_id=$subCategory->getName($subCategoryName,$categoryName);
        
       
       
        $viewPath = VIEWS_PATH . 'pages/subCategory.php';
        require_once $viewPath;
        $subCategoryView = new subCategory($this->getModel(), $this);
        $subCategoryView->output();
    }

    public function contact(){
        $viewPath = VIEWS_PATH . 'pages/contact.php';
        require_once $viewPath;
        $contactView = new contact($this->getModel(), $this);
        $contactView->output();
    }

    public function editContact(){
            $editContact=$this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id=$_POST['submit'];
                $image="card{$id}0";
                $card="card{$id}1";
                $link="card{$id}2";
                $editContact->setCaption($_POST[$card]);
                $editContact->setLink($_POST[$link]);

                /******************************************************Image Validation******************************************************/
                $root = $_SERVER['DOCUMENT_ROOT']. "/sheinaddict/app/views/images/";
                $fileName1=$root.basename($_FILES[$image]['name']);
                $file_name = $_FILES[$image]['name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $extension= array("jpeg","jpg","png");

                if(!empty($file_name)){
                    if(in_array($file_ext,$extension)===false){
                    ?>
                        <div class="text-center fixed-top" style="margin-top:550px;">  
                          <button class="btn btn-danger" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> extension not allowed,please choose a JPEG,JPG or a PNG file </button>
                        </div>
                        <?php
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }else{
                        ?>
                        <div class="text-center fixed-top" style="margin-top:550px;">  
                          <button class="btn btn-success" id="Db" style="width:50%"> Image and data updated successfully</button>
                        </div>
                        <?php
                        move_uploaded_file($_FILES[$image]['tmp_name'],$fileName1);
                        $editContact->setContactImage (basename($_FILES[$image]['name']));
                        $result=$editContact->editContact($_POST['submit']);
                    }
                }else{
                    ?>
                    <div class="text-center fixed-top" style="margin-top:550px;">  
                      <button class="btn btn-success" id="Db" style="width:50%"> Data updated successfully</button>
                    </div>
                    <?php
                    $result=$editContact->editContact($_POST['submit']);
                }
                /******************************************************Image Validation end******************************************************/
                // if(!$result){
                //     echo "<script> alert('{$_POST[$card]}') </script>";
                // }
            }
    
        $viewPath = VIEWS_PATH . 'pages/editContact.php';
        require_once $viewPath;
        $editContactView = new editContact($this->getModel(), $this);
        $editContactView->output();
    }

    public function viewProducts(){
        $viewPath = VIEWS_PATH . 'pages/viewProducts.php';
        require_once $viewPath;
        $viewProductsView = new viewProducts($this->getModel(), $this);
        $viewProductsView->output();
    }
    public function cart()
    {
        $cart = $this->getModel();
        $viewPath = VIEWS_PATH . 'pages/cart.php';
        require_once $viewPath;
        $cartView = new cart($this->getModel(), $this);
        $cartView->output();
    }

    public function shipping()
    {
        $editShipping=$this->getModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id=$_POST['submit'];
            // $helpText="helpText{$id}";
            // $editShipping->setHelpText($_POST[$helpText]);
        }

        $viewPath = VIEWS_PATH . 'pages/shipping.php';
        require_once $viewPath;
        $shippingView = new shipping($this->getModel(), $this);
        $shippingView->output();
    }

    public function measurement()
    {
        $viewPath = VIEWS_PATH . 'pages/measurement.php';
        require_once $viewPath;
        $measurementView = new measurement($this->getModel(), $this);
        $measurementView->output();
    }

    public function payment()
    {
        $viewPath = VIEWS_PATH . 'pages/payment.php';
        require_once $viewPath;
        $paymentView = new payment($this->getModel(), $this);
        $paymentView->output();
    }

    public function editShipping(){

        $editShipping = $this->getModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $editShipping->setTitle($_POST['title']);
            $id=[1,8];
            for($i=0;$i < count($id);$i++){
            $subtitle="subtitle{$id[$i]}";
            $text="text{$id[$i]}";
            $editShipping->setSubtitle_1($_POST[$subtitle]);
            $editShipping->setText($_POST[$text]);
            $result=$editShipping->editShipping($id[$i]);
            }  
        }
        $viewPath = VIEWS_PATH . 'pages/editShipping.php';
        require_once $viewPath;
        $editShippingView = new editShipping($this->getModel(), $this);
        $editShippingView->output();
    }

    public function editPayment(){

        $editPayment = $this->getModel();

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            $target_dir =$_SERVER['DOCUMENT_ROOT']. "/sheinaddict/app/views/images/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            //   if($check !== false) {
            //     echo "File is an image - " . $check["mime"] . ".";
            //     $uploadOk = 1;
            //   } else {
            //     echo "File is not an image.";
            //     $uploadOk = 0;
            //   }
            }
    
            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }
    
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
    
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
    
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
            
            $editPayment->setTitle($_POST['title']);
            $editPayment->setImage($_FILES["fileToUpload"]["name"]);
            $id=[6,7];
            for($i=0;$i < count($id);$i++){
                $text="text{$id[$i]}";
                $editPayment->setText($_POST[$text]);
                $result=$editPayment->editShipping($id[$i]);
            }  
        }

       
        $viewPath = VIEWS_PATH . 'pages/editPayment.php';
        require_once $viewPath;
        $editPaymentView = new editPayment($this->getModel(), $this);
        $editPaymentView->output();
    }

    public function editMeasurement(){

        $editMeasurement = $this->getModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $editMeasurement->setTitle($_POST['title']);
            $editMeasurement->setSubtitle_1($_POST['subtitle_1']);
            $editMeasurement->setImage($_FILES["fileToUpload"]["name"]);
            $id=[2,3,4,5];
            for($i=0; $i<count($id); $i++){
                $subtitle_2="subtitle{$id[$i]}";
                $text="text{$id[$i]}";
                $editMeasurement->setSubtitle_2($_POST[$text]);
                $editMeasurement->setText($_POST[$text]);
                $result=$editMeasurement->editMeasurement($id[$i]);
            }  
        }

       
        $viewPath = VIEWS_PATH . 'pages/editMeasurement.php';
        require_once $viewPath;
        $editMeasurementView = new editMeasurement($this->getModel(), $this);
        $editMeasurementView->output();
    }

    public function productInfo(){

        $productInfo = $this->getModel();
        if (isset($_GET['colorid'])){
    
            echo $_GET['colorid'];
            $colorid = $_GET['colorid'];
            echo $colorid;
               
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // echo $_SERVER['REQUEST_METHOD'];
                $productid = $_POST['addtocart'];
                $productInfo->insertIntoCart($_SESSION['user_id'], $productid, $colorid);
            }
        }


        $viewPath = VIEWS_PATH . 'pages/productInfo.php';
        require_once $viewPath;
        $productInfoView = new productInfo($this->getModel(), $this);
        $productInfoView->output();
    }

    public function viewCustomers()
    {
        $viewPath = VIEWS_PATH . 'pages/viewCustomers.php';
        require_once $viewPath;
        $viewCustomersView = new viewCustomers($this->getModel(), $this);
        $viewCustomersView->output();
    }

    public function search()
    {
        $viewPath = VIEWS_PATH . 'pages/search.php';
        require_once $viewPath;
        $searchView = new search($this->getModel(), $this);
        $searchView->output();
    }
}

