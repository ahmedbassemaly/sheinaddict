<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';

    public function login()
    {
        $this->dbh->query('SELECT * from users WHERE email = :email');
        $this->dbh->bind(':email', $this->email);

        $record = $this->dbh->single();
        echo $record->password;
        $hash_pass = $record->password;

        //Hash Password
        // echo password_hash($this->password, PASSWORD_DEFAULT)."<br>";
        // echo $hash_pass;

        echo "<br>".password_hash($this->password, PASSWORD_DEFAULT);

        if (password_verify($this->password,  $hash_pass)) {
            return $record;
        } else {
            return false;
        }
        //echo $this->password." ".$record->password;
        if ($this->password==$record->password) {
            return $record;
        } else {
            return false;
        }
    }
}
