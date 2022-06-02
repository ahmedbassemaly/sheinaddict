
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
  
  class editProfile extends View{
    public function output(){
        // $this->model->editUserData();
        //pattern="[0-5]{3}[0-9]{8}"    Pattern for Phine Number
        require APPROOT . '/views/inc/header.php';

        ?>
            <link rel="stylesheet" href="<?php echo URLROOT . 'css/editProfile.css'; ?>">

        <form action="" method="POST">
        <div class="card" >
        <div id="centerEditForm">
            <div class="row">
                <h1 class="card-title" style="text-align: center" id="title1">Edit Profile</h1>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label>First Name:<br></label>
                    <input type="text" name='Fname' id='Fname' value="<?php echo $this->model->getFname($_SESSION['user_id']) ?>" class="form-control" required>
                </div>
                <div class="col-lg-6" id=margin-bottom>
                    <label>Last Name:</label>
                    <input type="text" name='Lname' id="Lname" value="<?php echo $this->model->getLname($_SESSION['user_id']) ?>" class="form-control" >
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" id=margin-bottom>
                    <label>Email:</label>
                    <input type="text" name='Email' id="Email" value="<?php echo $this->model->getEmail($_SESSION['user_id']) ?>" class="form-control" >  
                </div>
            </div>    <div id="usernameMessage"></div> <div id="usernameMessage"></div>

            <div class="row">
                <div class="col-lg-6">
                    <label>Phone Number:</label>
                    <input type="text" name='PhoneNo' id="PhoneNo" value="<?php echo $this->model->getPhoneNo($_SESSION['user_id']) ?>" class="form-control" > 
                </div>
                <div class="col-lg-6" id=margin-bottom>
                    <label>Adress:</label>
                    <input type='text' name='Address' id="Address" value="<?php echo $this->model->getAddress($_SESSION['user_id']) ?>" class="form-control" > 
                </div>
                <p><button type="submit" name ="submit" id="submit">Update Profile</button></p>
            </div>
        
        </div>
    </div>
    </form>
    <?php
    require APPROOT . '/views/inc/footer.php';
    }
  }
  
?>
