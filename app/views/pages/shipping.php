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

        $id=$_GET['id'];
        $helpMethod = $this->model->getHelpMethod($id);
        $helpText=$this->model->getHelpText($id);

        require APPROOT . '/views/inc/header.php';
        $text = <<<EOT
        <div class="containter-shipping">
        <div class="title">
          <h1> FAQ $helpMethod</h1>
        </div>
        <h4>$helpText </h4>
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
