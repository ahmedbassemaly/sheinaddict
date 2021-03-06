<link rel="stylesheet" href="<?php echo URLROOT . 'css/shipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php
class shipping extends view
{
    public function output(){

        
        // $subtitle_1 = $this->model->subtitle_1;
        // $subtitle_2 = $this->model->subtitle_2;
        // $text_1 = $this->model->text_1;
        // $text_2 = $this->model->text_2;

        // $helpMethod = $this->model->getHelpMethod($id);
        // $helpText=$this->model->getHelpText($id);
        echo "<br><br>";
        $title = $this->model->getTitle();
        // $id=1;
        $subtitle1 = $this->model->getSubtitle_1(1);
        $subtitle8 = $this->model->getSubtitle_1(8);

        $text1=$this->model->getText(1);
        $text8=$this->model->getText(8);

    require APPROOT . '/views/inc/header.php';
    ?>

    <div class="containter-shipping" style="margin-left:5%; margin-right:5%;">
        <div class="title" style="margin-bottom:8%">
          <h1> <?php echo $title ?> </h1>
        </div>

        <!-- <?php
          foreach($subtitle as $value){
            ?>
              <div class="col-1 text-center d-flex align-items-center">
                <i class="fa-solid fa-money-bill-1-wave  me-2 fa-3x"></i></div>
                <p class="text"> <?php echo $value ?> </p>
              <p class="text"> <?php echo $text ?> </p>
            
            <?php
          }               
        ?> -->

        <div class="col-1 text-center d-flex align-items-center">
        <i  class="fa-solid fa-hourglass  me-2 fa-2x"></i></div>
          <p class="text" style="margin-top:-2%" style="margin-bottom:2%"> <?php echo $subtitle1?> </p>
        
        <br>  

        <div class="col-1 text-center d-flex align-items-center"><i class="fa-solid fa-a me-2 fa-2x"></i> </div>
        <p class="text" style="margin-top:-2%"> <?php echo $text1 ?> </p>
        
        <br><br>
        <hr style="width:50%; margin:auto">
        <br><br>

        <div class="col-1 text-center d-flex align-items-center">
        <i class="fa-solid fa-truck-fast me-2 fa-2x"></i></div>
          <p class="text" style="margin-top:-2%"> <?php echo $subtitle8?> </p>
        
        <br>

        <div class="col-1 text-center d-flex align-items-center"><i class="fa-solid fa-a  me-2 fa-2x"></i> </div>
        <p class="text" style="margin-top:-2%"> <?php echo $text8 ?> </p>

        
    </div>
    <br><br>

<?php

require APPROOT . '/views/inc/footer.php';
  }
}
?>
