<?php
  
  class editProfile extends View{
    public function output(){
        require APPROOT . '/views/inc/header.php';
        ?>
            <link rel="stylesheet" href="<?php echo URLROOT . 'css/editProfile.css'; ?>">
            <img src = "<?php echo ImageRoot . 'editProfileBackground.jpg' ; ?>" id="img"/>
            <h3 id="title"> Edit Personal Info </h3>
    <div id=centerEditForm>
        <div class="row">
			<div class="col-lg-6">
                <label>First Name:</label>
                <input type="text" name='Fname' id="Fname" placeholder="Bob" class="form-control" required>
            </div>
            <div class="col-lg-6" id=margin-bottom>
                <label>Last Name:</label>
                <input type="text" name='LName' id="Lname" placeholder="Smith" class="form-control" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" id=margin-bottom>
                <label>Email:</label>
                <input type="text" name='Email' id="Email" placeholder="Smith@email.com" class="form-control" >  
            </div>
        </div>    <div id="usernameMessage"></div> <div id="usernameMessage"></div>

        <div class="row">
			<div class="col-lg-6">
                <label>Phone Number:</label>
                <input type="text" name='PhoneNo' id="PhoneNo" placeholder="123456789" class="form-control" pattern="[0-5]{3}[0-9]{8}"> 
            </div>
            <div class="col-lg-6" id=margin-bottom>
                <label>Adress:</label>
                <input type='text' name='Address' id="Address"placeholder="ex: Cairo" class="form-control" > 
            </div>

            <input type="submit" name ="submit" id="submit" value = "Update Profile" class="btn btn-primary">
        </div>
        

    </div>
        <?php

    }
  }
?>