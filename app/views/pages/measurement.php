<link rel="stylesheet" href="<?php echo URLROOT . 'css/shipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php
class measurement extends view
{
    public function output(){

        // $title = $this->model->title;
        // $subtitle = $this->model->subtitle;
        // $Subsubtitle_1 = $this->model->Subsubtitle_1;
        // $Subsubtitle_2 = $this->model->Subsubtitle_2;
        // $Subsubtitle_3 = $this->model->Subsubtitle_3;
        // $Subsubtitle_4 = $this->model->Subsubtitle_4;
        // $text_1 = $this->model->text_1;
        // $text_2 = $this->model->text_2;
        // $text_3 = $this->model->text_1;
        // $text_4 = $this->model->text_2;

        $id=$_GET['id'];
        $title = $this->model->getTitle();
        $subtitle_1=$this->model->getsubtitle_1();
        $subtitle_2=$this->model->getsubtitle_2();
        $text=$this->model->getText();

    require APPROOT . '/views/inc/header.php';
    // $text = <<<EOT
    ?>

    <div class="containter-shipping">
      <div class="title">
        <h1> <?php echo $title ?> </h1>
      </div>
    
    <div class="chart-container">
      <img src= "<?php echo ImageRoot2 . $this->model->getImage(2) ; ?>"/></img>
    </div>
      <hr>
      <img src= "<?php echo ImageRoot2 . $this->model->getImage(3) ; ?>" style="float:right"/></img>
      <p class="text"> <?php echo $subtitle_1  ?> </p>

<?php
   foreach($subtitle_2 as $value){
     ?>
    <p class="text"> <?php echo $value ?> </p>
    <p class="text"> <?php echo $text ?> </p>
  <?php
   }
  ?>
      
      
      <!-- <p class="text"> <?php echo $text ?> </p> -->
    </div>

<!-- <p class="text"> <?php print json_encode($subtitle_2); ?> </p> -->
<?php
  // EOT;
//     echo $text;
require APPROOT . '/views/inc/footer.php';
  }
}
?>
