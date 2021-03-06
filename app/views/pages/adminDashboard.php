<link rel="stylesheet" href="<?php echo URLROOT . 'css/admin.css'; ?>">
<title>Dashboard</title>
<?php
class adminDashboard extends View{
    public function output(){
        require APPROOT . '/views/inc/sidebar.php';
        require APPROOT . '/views/inc/adminnavbar.php';
        ?>
        <div class="main">
            <h1>Dashboard</h1>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $this->model->getCustomer();?></h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                </div>
                <div class="card-single1">
                    <div>
                        <h1><?php echo $this->model->getOrders();?></h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-truck-front"></i></span>
                    </div>
                </div>
            </div>
            
        </div>

        <?php

    }
}
?>