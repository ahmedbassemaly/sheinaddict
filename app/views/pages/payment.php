<link rel="stylesheet" href="<?php echo URLROOT . 'css/shipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php
class payment extends view
{
    public function output(){

        $title = $this->model->getTitle();
        $text=$this->model->getText();

    require APPROOT . '/views/inc/header.php';
    ?>

    <div class="containter-shipping" style="margin-left:5%; margin-right:5%;">
        <div class="title">
          <br><br>
          <h1> <?php echo $title ?> </h1>
        </div>
      
      <img src= "<?php echo ImageRoot . $this->model->getImage(6) ; ?>" width="232" height="217" style="margin-left:42%"/></img>
      <br><br>
        <?php
        foreach($text as $value){
        ?>
            <p class="text"> <?php echo $value ?> </p>

        <?php
            }
        ?>
    </div>

<?php

require APPROOT . '/views/inc/footer.php';
  }
}
?>

