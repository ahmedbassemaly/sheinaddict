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
            <h6> No exchange ❌no refund ❌</h6>
        </div>
        <div class="FAQ-row">
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:blue;">Facebook</h3>
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo ImageRoot.$this->model->getContactImage(1); ?>" alt="Facebook Logo"><br>
                        <h6 class="card-title"><?php echo $this->model->getCaption(1); ?></h6>
                        <a href="<?php echo $this->model->getLink(1);?>">Facebook Link</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:#E86261;">Instagram</h3>
                <div class="card">
                    <div class="card-body">
                        <img src= "<?php echo ImageRoot.$this->model->getContactImage(2); ?>" alt="Instagram Logo"><br>
                        <h6 class="card-title"><?php echo $this->model->getCaption(2); ?></h6>
                        <a href="<?php echo $this->model->getLink(2); ?>">Instagram Link</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:green;">Whatsapp</h3>
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo ImageRoot.$this->model->getContactImage(3); ?>" alt="Whatsapp Logo"><rb>
                        <h6 class="card-title"><?php echo $this->model->getCaption(3); ?></h6>
                        <a href="<?php echo $this->model->getLink(3); ?>">Whatsapp Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}
?>