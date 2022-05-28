<link rel="stylesheet" href="<?php echo URLROOT . 'css/editFAQ.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<title>Edit FAQ</title>
<?php

class editFAQ extends View{
    public function output()
    {
    //$title = $this->model->title;;
    require APPROOT . '/views/inc/sidebar.php';
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    echo "<br><br><br><br>";
    //require APPROOT . '/views/inc/footer.php';
    }
    
    public function printForm(){
        ?>
        <div class="box-1" style="margin-top:5%;">
            <h1> Edit FAQ </h1>
        </div>
        
        <form action="" method="POST" enctype='multipart/form-data' style="margin-left:22%;">

        <label class="FAQName"><a href="<?php echo URLROOT . 'pages/editShipping'; ?>">Shipping</a> </label>
        <div class="cardBorders">
            <div class="FAQ-row">
                <div class="col-sm-3">
                    <div class="FAQBox">
                            <textarea style="resize:none;" name="helpText1" rows="8.5" cols="100"><?php echo $this->model->getHelpMethod(1); ?> </textarea>
                    </div>
                </div>
            </div>
            <button type="submit" value="1" id="updateFAQ" name="submit">Update FAQ </button>
        </div>

        <label class="FAQName"><a href="<?php echo URLROOT . 'pages/editMeasurement'; ?>">Measuremnt Chart</a></label>
        <div class="cardBorders">
            <div class="FAQ-row">
                <div class="col-sm-3">
                    <div class="FAQBox">
                            <textarea style="resize:none;" name="helpText2" rows="8.5" cols="100"><?php echo $this->model->getHelpMethod(2); ?> </textarea>
                    </div>
                </div>
            </div>
            <button type="submit" value="2" id="updateFAQ" name="submit">Update FAQ </button>
        </div>

        <label class="FAQName"><a href="<?php echo URLROOT . 'pages/editPayment'; ?>">Payment Method</a> </label>
        <div class="cardBorders">
            <div class="FAQ-row">
                <div class="col-sm-3">
                    <div class="FAQBox">
                            <textarea style="resize:none;" name="helpText3" rows="8.5" cols="100"><?php echo $this->model->getHelpMethod(3); ?> </textarea>
                    </div>
                </div>
            </div>
            <button type="submit" value="3" id="updateFAQ" name="submit">Update FAQ </button>
        </div>
            <!-- <div class="col-sm-3">
            <label><b>Measurment Charts</b></label>
                <div class="card">
                    <div class="card-body">
                    <textarea style="resize:none;" name="measurment" placeholder="Type here..."></textarea>
                    <button type="submit" value="2" id="updateFAQ" name="submit">Update FAQ </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
            <label><b>Payment Method</b></label>
                <div class="card">
                    <div class="card-body">
                    <textarea style="resize:none;" name="payment" placeholder="Type here..."></textarea>
                    <button type="submit" value="3" id="updateFAQ" name="submit">Update FAQ </button>
                    </div>
                </div>
            </div> -->
        
        </form>

    <?php
    }
}
?>