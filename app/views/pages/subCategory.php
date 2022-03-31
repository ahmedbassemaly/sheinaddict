
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
 class subCategory extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        $this->subCategory();
        require APPROOT . '/views/inc/footer.php';
    }

public function subCategory(){
    ?>
    <h1>Sub Category Page</h1>
    <?php
}

}