<?php
class viewProfileModel extends Model{
    protected $user_id;
    protected $lname;
    protected $email;
    protected $address;
    protected $phone;

    public function __construct(){
        parent::__construct();
        $this->lname="";
        $this->email="";
        $this->address="";
        $this->phone="";
    }

    public function getUser($id){
        $this->dbh->query('SELECT * FROM users WHERE `user_id` = :id');
        $this->dbh->bind(':lname', $this->lname);
        $this->dbh->bind(':phone', $this->phone);
        $this->dbh->bind(':email', $this->email);
        $this->dbh->bind(':address', $this->address);
        $record=$this->dbh->execute();

        
    }
    public function getLname($id){
        $this->dbh->query("SELECT lastName FROM users WHERE `user_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->lastName;
    }
    public function getEmail($id){
        $this->dbh->query("SELECT email FROM users WHERE `user_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->email;
    }
    public function getAddress($id){
        $this->dbh->query("SELECT Address FROM users WHERE `user_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->Address;
    }
    public function getPhone($id){
        $this->dbh->query("SELECT phoneNumber FROM users WHERE `user_id` = :id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->phoneNumber;
    }
}
?>