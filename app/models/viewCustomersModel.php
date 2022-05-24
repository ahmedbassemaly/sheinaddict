<?php
class viewCustomersModel extends model{
        // protected $user_id;
        protected $fname;
        protected $lname;
        protected $email;
        protected $phone;
        protected $orderNum;
    
        public function __construct(){
            parent::__construct();
            $this->fname="";
            $this->lname="";
            $this->email="";
            $this->order_id="";
            $this->phone="";

        }
        
        public function getCustomer(){
            $this->dbh->query("SELECT * FROM users WHERE userType_id = 2");
            $this->dbh->execute();
            return $this->dbh->rowCount();
        }

        // public function getUser($id){
        //     $this->dbh->query(`SELECT * FROM users WHERE `user_id` = :id`);
        //     $this->dbh->bind(`:fname`, $this->lname);
        //     $this->dbh->bind(`:lname`, $this->lname);
        //     $this->dbh->bind(`:phone`, $this->phone);
        //     $this->dbh->bind(`:email`, $this->email);
        //     $this->dbh->bind(`:orderNum`, $this->order_id);
        //     return $this->dbh->execute();           
        // }
        public function getID(){
            $this->dbh->query("SELECT user_id FROM users WHERE `userType_id`=2");
            return $this->dbh->resultFetchCol();
        }

        public function getFname($id){
            $this->dbh->query("SELECT firstName FROM users WHERE `user_id` = :id AND `userType_id`=2");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->firstName;
        }

        public function getLname($id){
            $this->dbh->query("SELECT lastName FROM users WHERE `user_id` = :id AND `userType_id`=2");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->lastName;
        }

        public function getEmail($id){
            $this->dbh->query("SELECT email FROM users WHERE `user_id` = :id AND `userType_id`=2");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->email;
        }
        // public function getOrder_id($id){
        //     $this->dbh->query("SELECT order_id FROM orders, users WHERE `order_id` = :id AND `userType_id`=2");
        //     $this->dbh->bind(':id',$id);
        //     return $this->dbh->single()->order_id;
        // }
        public function getPhone($id){
            $this->dbh->query("SELECT phoneNumber FROM users WHERE `user_id` = :id AND `userType_id`=2");
            $this->dbh->bind(':id',$id);
            return $this->dbh->single()->phoneNumber;
        }

}

?>