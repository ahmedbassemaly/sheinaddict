<link rel="stylesheet" href="<?php echo URLROOT . 'css/shipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php
class shipping extends view
{
    public function output(){

        $title = $this->model->title;
        $subtitle_1 = $this->model->subtitle_1;
        $subtitle_2 = $this->model->subtitle_2;
        $text_1 = $this->model->text_1;
        $text_2 = $this->model->text_2;

        require APPROOT . '/views/inc/header.php';
        $text = <<<EOT
        <div class="containter-shipping">
        <div class="title">
          <h1> $title</h1>
        </div>
        <h4> $subtitle_1</h4>
        <p class="text">$text_1</p>
        <h4> $subtitle_2</h4>
        <p class="text">$text_2</p>
        </div>
      </div>
    EOT;
        echo $text;
?>
  
  <?php
    require APPROOT . '/views/inc/footer.php';
 }
}
?>
