<link rel="stylesheet" href="<?php echo URLROOT . 'css/editContact.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php

class editContact extends View{
    public function output()
    {
    //$title = $this->model->title;;
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
    }
    
    public function printForm(){
        ?>
        <div class="box-1">
            <h1> Come join our family!</h1>
            <h4> Our social media accounts</h4>
        </div>
        <div class="FAQ-row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <label id="fileUpload"> <input type="file" name="fileToUpload"> </label>
                        <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                        <input type="text" name="card1" placeholder="Facebook Group caption">
                        <input type="text" name="card1" placeholder="add Facebook Link">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                    <label id="fileUpload"> <input type="file" name="fileToUpload"> </label>
                        <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                        <input type="text" name="card1" placeholder="Instagram Page caption">
                        <input type="text" name="card1" placeholder="add Instagram Link">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                    <label id="fileUpload"> <input type="file" name="fileToUpload"> </label>
                        <input type="submit" value="Upload Image" id="fileUpload" name="submit">
                        <input type="text" name="card1" placeholder="Whatsapp Group caption">
                        <input type="text" name="card1" placeholder="add Whatsapp Link">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}
?>