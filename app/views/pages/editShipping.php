<link rel="stylesheet" href="<?php echo URLROOT . 'css/editShipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<title>Edit FAQ</title>
<?php

class editShipping extends View{

    public function output()
    {

        // $subtitle_1=$this->model->getSubtitle_1();
        // $text=$this->model->getText();

    require APPROOT . '/views/inc/header.php';
        ?>
        <div class="box-1">
            <h1> Edit Shipping </h1>
        </div>
        
        <form action="" method="POST" enctype='multipart/form-data'>
            <div class="newContainer">
                <input type="text" name="title" value="<?php echo $this->model->getTitle();?>">
            </div>

            <div class="newConatiner1">
                    <input type="text" name="subtitle1"  value="<?php echo $this->model->getSubtitle_1(1);?>">
                    <textarea name="text1"><?php echo $this->model->getText(1);?></textarea>
                    <input type="text" name="subtitle8" value="<?php echo $this->model->getSubtitle_1(8);?>">
                    <textarea name="text8" ><?php echo $this->model->getText(8);?></textarea>
                    
                <button type="submit" value="1" id="submit" name="submit">Update FAQ </button>
            </div>
        </form>

    <?php
        echo "<br><br><br><br>";
        require APPROOT . '/views/inc/footer.php';
    }
}
?>