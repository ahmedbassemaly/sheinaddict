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

        $title = $this->model->getTitle();
        $subtitle = $this->model->getSubtitle_1();
        $text=$this->model->getText();

    require APPROOT . '/views/inc/header.php';
    ?>

    <div class="containter-shipping">
        <div class="title">
          <h1> <?php echo $title ?> </h1>
        </div>
    
      <!-- <img src= "<?php echo ImageRoot . 'payment.png' ; ?>" style="float:left"/></img> -->

        <?php
        foreach($subtitle as $value){
        ?>
          <p class="text"> <?php echo $value ?> </p>
          <p class="text"> <?php echo $text ?> </p>

        <?php
            }
        ?>
    </div>

<?php

require APPROOT . '/views/inc/footer.php';
  }
}
?>
