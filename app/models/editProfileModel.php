<?php
class editProfileModel extends Model{
    // Database Connection

    protected $firstName;
    protected $lastName;
    protected $phoneNumber;
    protected $email;
    protected $Address;

    public function __construct(){
        parent::__construct();
        $this->firstName = "";
        $this->lastName = "";
        $this->phoneNumber = "";
        $this->email = "";
        $this->Address = "";
    }


    public function getFname($id){
        $this->dbh->query("SELECT firstName FROM users WHERE `user_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->firstName;
    }

    public function setFname($firstName){
        $this->firstName = $firstName;
    }

    public function getLname($id){
        $this->dbh->query("SELECT lastName FROM users WHERE `user_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->lastName;
    }

    public function setLname($lastName){
        $this->lastName = $lastName;
    }


    public function getPhoneNo($id){
        $this->dbh->query("SELECT phoneNumber FROM users WHERE `user_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->phoneNumber;
    }

    public function setPhoneNo($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }


    public function getEmail($id){
        $this->dbh->query("SELECT email FROM users WHERE `user_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getAddress($id){
        $this->dbh->query("SELECT Address FROM users WHERE `user_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->Address;
    }

    public function setAddress($Address){
        $this->Address = $Address;
    }

    /**********************************VALIDATION************************************************/
    function filterEmail($email){
        $oldEmail = $email;
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        
        if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false && $email===$oldEmail)
        {
            return true;
        }
        else{
            return false;
        }
    }
    function phoneValidation($phone){
        if(preg_match('/^[0-9]{11}+$/', $phone)) {
                return true;
            } else {
                return false;
            }
    }
    /**********************************VALIDATION************************************************/

    public function editUserData($id){

        $this->dbh->query("UPDATE users SET `firstName`=:firstName, `lastName`=:lastName, `phoneNumber`=:phoneNumber, `email`=:email, `Address`=:Address WHERE `user_id`=:id");
        
        $this->dbh->bind(':firstName',$this->firstName);
        $this->dbh->bind(':lastName',$this->lastName);
        $this->dbh->bind(':phoneNumber',$this->phoneNumber);
        $this->dbh->bind(':email',$this->email);
        $this->dbh->bind(':Address',$this->Address);
        $this->dbh->bind(':id',$id);

        return $this->dbh->execute();
        
    }
}

?>