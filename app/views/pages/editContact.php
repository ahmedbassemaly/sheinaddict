
<link rel="stylesheet" href="<?php echo URLROOT . 'css/editContact.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

<!-- <script>
function checkValidImage(image){
        // $this->model->getContactImage(id);
        // var image = echo $this->model->getContactImage(id);

        $.ajax({
            url:VIEWS_PATH."contact.php",
            type:'post',
            data:{image:image},
            success:function(response){
                document.getElementById('imageResponse').innerHTML = "Image is uploaded successfully";
                var msg = response;     
                $("#message").html(response);
            },
            error:function(response){
                document.getElementById('imageResponse').innerHTML = "Image is not uploaded successfully";
            }
        });
    }

    function ShowAlert(msg_title, msg_body, msg_type) {
      var AlertMsg = $('div[role="alert"]');
      $(AlertMsg).find('strong').html(msg_title);
      $(AlertMsg).find('p').html(msg_body);
      $(AlertMsg).removeAttr('class');
      $(AlertMsg).addClass('alert-dismissible');
      $(AlertMsg).addClass('alert alert-' + msg_type);
      $(AlertMsg).show();
  }
</script> -->

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
        <form action="" method="POST" enctype='multipart/form-data'>
        <div class="FAQ-row">
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:blue;">Facebook</h3>
                <div class="card">
                    <div class="card-body">
                        <label id="fileUpload"> <input type="file" name="card10" value="<?php echo ImageRoot.$this->model->getContactImage(1); ?>"> </label>
                        <input type="text" name="card11" value="<?php echo $this->model->getCaption(1); ?>">
                        <input type="text" name="card12" value="<?php echo $this->model->getLink(1); ?>">
                        <button type="submit" value="1" id="fileUpload" name="submit">Update Social </button>
                    </div>
                </div>
                <div id="imageResponse">
                    
                </div>

            </div>
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:#E86261;">Instagram</h3>
                <div class="card">
                    <div class="card-body">
                        <label id="fileUpload"> <input type="file" name="card20" value="<?php echo $this->model->getContactImage(2); ?>"> </label>
                        <input type="text" name="card21" value="<?php echo $this->model->getCaption(2); ?>">
                        <input type="text" name="card22" value="<?php echo $this->model->getLink(2); ?>">
                        <button type="submit" value="2" id="fileUpload" name="submit">Update Social </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h3 style="margin-left:22.5%; color:green;">Whatsapp</h3>
                <div class="card">
                    <div class="card-body">
                        <label id="fileUpload"> <input type="file" name="card30" value="<?php echo $this->model->getContactImage(3); ?>"> </label>
                        <input type="text" name="card31" value="<?php echo $this->model->getCaption(3); ?>">
                        <input type="text" name="card32" value="<?php echo $this->model->getLink(3); ?>">
                        <button type="submit" value="3" id="fileUpload" name="submit">Update Social </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    
    <?php
    }
}
?>