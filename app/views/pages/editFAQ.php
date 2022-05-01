<link rel="stylesheet" href="<?php echo URLROOT . 'css/editFAQ.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<title>Edit FAQ</title>
<?php

class editFAQ extends View{
    public function output()
    {
    //$title = $this->model->title;;
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    echo "<br><br><br><br>";
    require APPROOT . '/views/inc/footer.php';
    }
    
    public function printForm(){
        ?>
        <div class="box-1">
            <h1> Edit FAQ </h1>
        </div>
        <div class="FAQ-row">
            <div class="col-sm-3">
                <label><b>Shipping Policy</b></label>
                <div class="card">
                    <div class="card-body">
                        <textarea style="resize:none;" name="shipping" placeholder="Type here..."></textarea>
                       
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            <label><b>Measurment Charts</b></label>
                <div class="card">
                    <div class="card-body">
                    <textarea style="resize:none;" name="measurment" placeholder="Type here..."></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            <label><b>Payment Method</b></label>
                <div class="card">
                    <div class="card-body">
                    <textarea style="resize:none;" name="payment" placeholder="Type here..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
?>