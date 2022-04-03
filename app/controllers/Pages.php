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
}

