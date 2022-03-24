<html>
<head><link rel="stylesheet" href="<?php echo URLROOT . 'css/login.css'; ?>"></head>
</html>
<?php
class Login extends View
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
    ?>
    <br>
    <div class="login">
    
      <form action="" method="POST" class="formcontainer">
        <br>
        <h2>Login</h2>
        <div class="form__field">
            <input type="text" id="Email" name="email" placeholder="Email" class='input-line full-width'>
        </div>
        <div class="form__field">
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <div class="form__field">
            <input type="submit" value="Login" id="submit" name="submit">
        </div>
      </form>
      <p class="acc"> Don't have an account yet?<a style="color:blue;" href = "<?php echo URLROOT . 'users/register';?>"> Sign Up here!</a></p>
      <?php echo "<a style='color:blue;' href='".URLROOT."pages/editProfile'> Profile </a>"; ?>
      <br>
  </div>
    <br><br>
    <?php
  }

  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('email', 'email', $val, $err, $valid);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid);
  }

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val">
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}
