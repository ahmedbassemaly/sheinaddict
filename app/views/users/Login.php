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
    /********** Backend Login **********/
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/Register';
    /********** Backend Login **********/
    ?>
    <br>
    <div class="login">
    
      <form action="<?php echo $action;?>" method="post"class="formcontainer">
        <br>
        <h2>Login</h2>
        <div class="form__field">
            <!-- <input type="text" id="Email" name="email" placeholder="Email" class='input-line full-width'> -->
            <?php $this->printEmail();?>
        </div>
        <div class="form__field">
            <!-- <input type="password" id="password" name="password" placeholder="Password"> -->
            <?php $this->printPassword();?>
  </div>
        <div class="form__field">
            <input type="submit" value="Login" id="submit" name="submit">
        </div>
      </form>
      <p class="acc"> Don't have an account yet?<a style="color:blue;" href = "<?php echo URLROOT . 'users/register';?>"> Sign Up here!</a></p>
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

    $this->printInput('email', 'email', $val, $err, $valid,'Email');
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid,'Password');
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$placeholder)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    ?>
      <input type="<?php echo $type;?>" id="txt" name="<?php echo $fieldName;?>" placeholder="<?php echo $placeholder; ?>" class='<?php echo $valid; ?>'>
      <span class="invalid-feedback"><?php echo $err;?></span>
    
<?php
  }
}
