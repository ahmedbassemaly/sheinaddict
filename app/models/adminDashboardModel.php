<?php
class adminDashboardModel extends Model{
    protected $customers;
    protected $orders;

    public function __construct(){
        parent::__construct();
        $this->customers=0;
        $this->orders=0;
    }
    public function getCustomer(){
        $this->dbh->query("SELECT * FROM users WHERE userType_id = 2");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }
    public function getOrders(){
        $this->dbh->query("SELECT * FROM orders");
        $this->dbh->execute();
        return $this->dbh->rowCount();
    }
}
?>