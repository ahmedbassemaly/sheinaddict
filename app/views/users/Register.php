<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
class Register extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    /********** Backend SignUp **********/
    $action = URLROOT . 'users/register';
    $loginUrl = URLROOT . 'users/login';
    /********** Backend SignUp **********/
    
    ?>
    <div class="register">
    <link rel="stylesheet" href="<?php echo URLROOT . 'css/register.css'; ?>">
      <form action="<?php echo $action ?>" method="POST" class="formcontainer">
        <br>
        <h2>Sign Up</h2>
        <div class="form__field">
          
            <!-- <input type="text" id="txt" name="fname" placeholder="First Name"> -->
            <?php $this->printName();?>
            <!-- <input type="text" id="txt" name="lname" placeholder="Last Name"> -->
            <?php $this->printLName();?>
          
        </div>
        <div class="form__field">
          
            <!-- <input type="text" id="Email" name="Email" placeholder="Email" class='input-line full-width'> -->
            <?php $this->printEmail();?>
          
        </div>
        <div class="form__field">
          
            <!-- <input type="password" id="password" name="password" placeholder="Password"> -->
            <?php $this->printPassword();?>
          
        </div>
          
            <!-- <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"> -->
            <?php $this->printConfirmPassword();?>
        <div class="form__field">
          
            <!-- <input type="text" id="phone" name="phone" placeholder="Phone Number"> -->
            <?php $this->printMobile();?>
            <!-- <input type="text" id="address" name="address" placeholder="Address"> -->
            <?php $this->printAddress();?>
          
        </div>
        <div class="form__field">
          
            <input type="submit" value="Create My Account" id="submit" name="submit">
          
        </div>
      </form>
      <p class="acc">Already have an account? <a style="color:blue;"href="<?php echo URLROOT . 'users/Login'; ?>">Log in here </a></p>
      <br>
  </div>
    <?php
  }

  private function printName()
  {
    $val = $this->model->getFName();
    $err = $this->model->getFNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'fname', $val, $err, $valid,'First Name');
  }
  private function printLName()
  {
    $val = $this->model->getLName();
    $err = $this->model->getLNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'lname', $val, $err, $valid,'Last Name');
  }
  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('email', 'Email', $val, $err, $valid,'Email');
  }
  private function printMobile()
  {
    $val = $this->model->getMobile();
    $err = $this->model->getMobileErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'phone', $val, $err, $valid,'Phone Number');
  }
  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid,'Password');
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'confirm_password', $val, $err, $valid,'Confirm Password');
  }
  private function printAddress()
  {
    $val = $this->model->getAddress();
    $err = $this->model->getAddressErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'address', $val, $err, $valid,'Address');
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$placeholder)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
      <input type="$type" id="txt" name="$fieldName" placeholder="$placeholder" class='$valid'>
      <span class="invalid-feedback">$err</span>
EOT;
    echo $text;
  }
}
