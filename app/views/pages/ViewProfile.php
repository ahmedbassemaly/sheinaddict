<link rel="stylesheet" href="<?php echo URLROOT . 'css/viewProfile.css'; ?>">
<script src="https://kit.fontawesome.com/a8598e67d0.js" crossorigin="anonymous"></script>
<?php
class ViewProfile extends view{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        ?>
        <div class="text">
            <h4>Your Profile</h4>
        </div>
        <div class="container">
            <div class="profile-card">
                <div class="profile-card_name">
                    <div class="fName">
                        First Name
                    </div>
                    <div class="lName">
                        Last Name
                    </div>
                </div>
                <div class="profile-card_email">
                <i class="fa-solid fa-envelope"></i> Email
                </div>
                <div class="profile-card_address">
                    <i class="fa-solid fa-location-dot"></i>Address
                </div>
                <div class="profile-card_number">
                    <i class="fa-solid fa-phone"></i>Phone number
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
                    <button type="button">Edit Profile</button>
                </div>

            </div>
        </div>
        <?php
        
        require APPROOT . '/views/inc/footer.php';
    }
}
?>