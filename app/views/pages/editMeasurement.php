<link rel="stylesheet" href="<?php echo URLROOT . 'css/editShipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Edit FAQ</title>
<?php

class editMeasurement extends View{

    public function output()
    {

    require APPROOT . '/views/inc/header.php';
        ?>
        <div class="box-1">
            <h1> Edit Measurement </h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data'>

           
            <div class="newContainer">
            <input type="text" name="title" value="<?php echo $this->model->getTitle(2);?>">
            </div>
                
                <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
                <img id='blah' src="#" alt="Image Preview"/>

            <hr>
            <input type="text" name="subtitle_1" value=<?php echo $this->model->getSubtitle_1(2);?> />
            <div class="newContainer11">
                <?php
                    for($i=2; $i<6; $i++){
                ?>
                
                <input type="text" name="subtitle".$i value=<?php echo $this->model->getSubtitle_2($i);?> />
                 <textarea name="<?php echo "text".$i; ?>" > <?php echo $this->model->getText($i);?> </textarea><br><br>
                <?php
                    }
                ?>
                
            </div>
                <input type="file" name="fileToUpload-2" id="fileToUpload-2" onchange="uploadFile(this);">
                <img id='img' src="#" alt="Image Preview"/>

                <button type="submit" value="4" id="updateFAQ" name="submit">Update FAQ </button>
            
       
        </form>

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function uploadFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
</script>

    <?php

        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        require APPROOT . '/views/inc/footer.php';
    }
}
?>