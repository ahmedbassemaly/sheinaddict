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
            $result=$editProfile->editUserData($_SESSION['user_id']);
            

            #_________________filter email_________________#
                // $oldEmail = $email;
                // $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                
                // if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false && $email===$oldEmail)
                // {
                //     return true;
                // }
                // else{
                //     return false;
                // }
        
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
            $helpText="helpText{$id}";
            $editFAQ->setHelpText($_POST[$helpText]);
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
            /*************IMAGES*************/
            $root = $_SERVER['DOCUMENT_ROOT']. "/sheinaddict/app/views/images/addProduct/";
            if(!empty($_POST['color'])) {
                foreach($_POST['color'] as $value){
                    //echo "Chosen color : ".$value.'<br/>';
                        for($i=0;$i<count($_FILES['fileToUpload'.$value]['name']);$i++){
                            $fileName1=$root.basename($_FILES['fileToUpload'.$value]['name'][$i]);
                            $file_name = $_FILES['fileToUpload'.$value]['name'][$i];
                            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['fileToUpload'.$value]['tmp_name'][$i],$fileName1);
                            //echo "Chosen image : ".$_FILES['fileToUpload'.$value]['name'][$i].'<br/>';
                        }
                    }
                }
            /*************IMAGES*************/
            $result=$addProduct->insertProduct($_FILES);

        }

        $viewPath = VIEWS_PATH . 'pages/addProduct.php';
        require_once $viewPath;
        $addProductView = new addProduct($this->getModel(), $this);
        $addProductView->output();
    }

    public function editProduct()
    {
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
            $helpText="helpText{$id}";
            $editShipping->setHelpText($_POST[$helpText]);
        }

        $viewPath = VIEWS_PATH . 'pages/shipping.php';
        require_once $viewPath;
        $shippingView = new shipping($this->getModel(), $this);
        $shippingView->output();
    }

    public function productInfo(){
        $viewPath = VIEWS_PATH . 'pages/productInfo.php';
        require_once $viewPath;
        $productInfoView = new productInfo($this->getModel(), $this);
        $productInfoView->output();
    }

    // public function editFAQ(){
    //     $viewPath = VIEWS_PATH . 'pages/editFAQ.php';
    //     require_once $viewPath;
    //     $editFAQView = new editFAQ($this->getModel(), $this);
    //     $editFAQView->output();
    // }
}

