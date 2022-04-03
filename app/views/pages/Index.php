
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo URLROOT . 'css/homePage.css'; ?>">
<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';

?>

<!-- <div class = "center">
   <p>Shein Addict</p>
</div> -->

<div class="row-1">
    <div class="pic-wrapper">
      
        <figure class="pic-1"><img src= "<?php echo ImageRoot . 'my_img_auto_x2 (1).jpg' ; ?>"/></figure>
        <figure class="pic-2"><img src= "<?php echo ImageRoot . 'new_img_auto_x2.jpg' ; ?>"/></figure>
        <figure class="pic-3"><img src= "<?php echo ImageRoot . 'my_img_auto_x2 (3).jpg' ; ?>"/></figure>
        <figure class="pic-4"><img src= "<?php echo ImageRoot . 'clothes.jpg' ; ?>"/></figure>
        
    </div>
 </div>


<div class="container-1">
        <div class="section-title">
            <h1>Discover More</h1>
        </div>

        <div class="row">
    <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src= "<?php echo ImageRoot . 'img1.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a class="index" href="#">Women</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat velit qui quos repellat nulla soluta exceptu</p>
                            <div class="effect-btn">
                                <a href="#" class="btn"><i class="fa fa-eye" aria-hidden="true"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src="<?php echo ImageRoot . 'img2.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a class="index" href="#">Men</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat velit qui quos repellat nulla cum soluta exceptu</p>
                            <div class="effect-btn">
                                <a href="#" class="btn"><i class="fa fa-eye"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="effect">
                    <div class="effect-img">
                        <img src="<?php echo ImageRoot . 'img3.jpg' ; ?>"/>
                    </div>
                    <div class="effect-text">
                        <div class="inner">
                            <h2><a class="index" href="#">Kids</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat velit qui quos repellat nulla cum soluta exceptu</p>
                            <div class="effect-btn">
                                <a href="#" class="btn"><i class="fa fa-eye"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
