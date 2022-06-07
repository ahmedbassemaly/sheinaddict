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
        <br><br>
        <h1> <?php echo $title ?> </h1>
      </div>
    
    <div class="chart-container">
      <img src= "<?php echo ImageRoot . $this->model->getImage(2) ; ?>"/></img>
    </div>
    <br><br>
      <hr style="width:50%; margin:auto">
      <br>
      <img src= "<?php echo ImageRoot . $this->model->getImage(3) ; ?>" style="float:right; margin-right:30%; margin-top:2%"/></img>
      
      <div><div class="col-1 text-center d-flex align-items-center">
      <i class="fa-solid fa-circle-question me-2 fa-2x"style= "margin-left:20%"></i></div>
      <p class="text "style="margin-top:-2%"> <?php echo $subtitle_1  ?> </p>

<?php
   for($i=0; $i<count($subtitle_2); $i++){
     ?>
    <p class="text"> <?php echo $subtitle_2[$i] ?> </p>
    <p class="text"> <?php echo $text[$i] ?> </p>
  <?php
   }
  ?>
      
      
      <!-- <p class="text"> <?php echo $text ?> </p> -->
    </div>
    <br><br>

<!-- <p class="text"> <?php print json_encode($subtitle_2); ?> </p> -->
<?php
  // EOT;
//     echo $text;
require APPROOT . '/views/inc/footer.php';
  }
}
?>

