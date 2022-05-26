<link rel="stylesheet" href="<?php echo URLROOT . 'css/viewProfile.css'; ?>">
<script src="https://kit.fontawesome.com/a8598e67d0.js" crossorigin="anonymous"></script>
<title>Your Profile</title>
<?php
class ViewProfile extends view{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        ?>
        <div class="text" >
            <h4 style="color:black;margin-top:7%;";>Your Profile</h4>
        </div>
        <div class="container">
            <div class="profile-card" >
                <div class="profile-card_name" style='font-size:230%';>
                    <!-- <div class="fName"> -->
                        <?php echo $_SESSION['user_name'] . " ". $this->model->getLname($_SESSION['user_id']);?>
                    <!-- </div> -->
                    <!-- <div class="lName"> -->
                        
                    <!-- </div> -->
                </div>
                <div class="profile-card_email" style='font-size:120%';>
                <i class="fa-solid fa-envelope"></i> <?php echo $this->model->getEmail($_SESSION['user_id']);?>
                </div>
                <div class="profile-card_address">
                    <i class="fa-solid fa-location-dot"></i> <?php echo $this->model->getAddress($_SESSION['user_id']);?>
                </div>
                <div class="profile-card_number" style='font-size:100%';>
                    <i class="fa-solid fa-phone"></i><?php echo $this->model->getPhone($_SESSION['user_id']);?>
                </div>
                <div class="profile-card_info">
                    <div class="profile-card_info_num">
                        #
                    </div>
                    <div class="profile-card_info_text">
                        Orders
                    </div>
                </div>
                <div class="edit">
                <a href="<?php echo URLROOT . 'pages/editProfile'; ?>"><button type="button">Edit Profile</button></a>
                </div>

            </div>
        </div>
        <?php
        
        require APPROOT . '/views/inc/footer.php';
    }
}
?>