<link rel="stylesheet" href="<?php echo URLROOT . 'css/viewProducts.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<head>
<script>
function showResult(str) {
    $.ajax({
                        type: 'POST',
                        url: 'viewProducts',
                        data: {search:str},
                        success: (result)=>{
                            $('#livesearch').html(result);
                        }
                    })
}
</script>
</head>
<?php

class viewProducts extends View{
    public function output()
    {
    // require APPROOT . '/views/inc/adminnavbar.php';
    require APPROOT . '/views/inc/sidebar.php';
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    //require APPROOT . '/views/inc/footer.php';
    }
 
    public function printForm(){
        $i=1;
        ?>
        <div class="col-md-10">
        <form>
            <input type="text" size="30" style="margin-top:10%;margin-left:50%;"onkeyup="showResult(this.value)">
            
        </form>
        <?php $action = URLROOT . '/pages/addProduct'; ?>
        <form method="post" action="<?php echo $action;?>">
            <button type="submit" value="addProduct" name ="submit" id="addProduct">Add Product</button>
        </form>
        <!-- <a href="<?php echo URLROOT . 'pages/addProduct'; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Product</a> -->
        </div>
        <div id="livesearch">
        <?php
            $this->model->getProducts();
        echo "</div>";
    }
}
?>