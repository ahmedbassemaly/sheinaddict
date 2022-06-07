
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
 class orders extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        require APPROOT . '/views/inc/sidebar.php';
        $this->displayOrders();
        //require APPROOT . '/views/inc/footer.php';
    }

    public function displayOrders(){
        $getOrdersDescription=$this->model->getOrdersDescription();
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/orders.css'; ?>">
        <h1 id="title"> Orders to Egypt</h1>

    <div class="container" style="margin-left:20%;">
        <?php
            $i=0;
            $names = $this->model->customerName();
            for($j=0; $j<count($names); $j++){
        ?>
        <div class="container-fluid py-5 mx-auto">
            <div class="card py-4 px-4">
                <div class="row justify-content-start px-3">
                    <div class="text-left">
                        <h2><?php echo $names[$j]."  "; ?></h2>
                        <hr>
                    </div>
            </div>

            <div class="line"></div>
                <div class="row d-flex justify-content-between px-3">
                    <?php
                        $orderID = $this->model->orderID()[$j];
                        $image = $this->model->Image($orderID);
                        $totalAmount = $this->model->totalAmount($orderID);
                        $totalItems = $this->model->totalItems($orderID);

                        for($i=0; $i<count($image); $i++){
                            ?>
                        
                        <div class="prod-bg text-center py-1"><img class="prod-pic" src = "<?php echo ImageRoot . "addproduct/".$image[$i]; ?>"></div>
                            <?php
                            }
                            ?>
                        <hr>
                    <h6>Total Items:<?php echo $totalItems[0] ?> - Total Amount:<?php echo $totalAmount[0] ?></h6>
                <div class="btn btn-pink ml-auto">Order Shipped</div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    </div>
        <?php
    }

} 
?>