<link rel="stylesheet" href="<?php echo URLROOT . 'css/contact.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php

class contact extends View{
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
                        <img src="<?php echo ImageRoot . 'facebooklogo.png' ; ?>"/></img><br>
                    <h6 class="card-title">Join us in our Facebook Group</h6>
                    <a href="https://www.facebook.com/groups/1255568221634134/">Facebook Link</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img src= "<?php echo ImageRoot . 'instagramlogo.png' ; ?>"/></img><br>
                        <h6 class="card-title">Follow us on our Instagram Page</h6>
                        <a href="https://www.instagram.com/invites/contact/?i=13b1dpn9mg01e&utm_content=nk3ccha">Instagram Link</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo ImageRoot . 'whatsapplogo.png' ; ?>"/></img><rb>
                        <h6 class="card-title">Join us in our Whatsapp Group</h6>
                        <a href="https://chat.whatsapp.com/FRLbtOiTAvMIqhzQcW60xM">Whatsapp Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}
?>