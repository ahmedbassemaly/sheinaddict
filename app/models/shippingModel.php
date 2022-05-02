<?php

class shippingModel extends model{

    // public $title="FAQ SHIPPING ";
    public $subtitle_1="HOW LONG DOES IT TAKE TO PROCESS AN ORDER? ";
    public $subtitle_2="WHAT ABOUT SHIPPING?";
    public $text_1="Please allow 1.2 days for your order to be processed for shipping. We make every effort to fulfill orders as quickly os possible. Understand we are a team of humans, working with human hands, and human brains. We aren't perfect. Read more about order processing here. ";
    public $text_2="We ship Billy! both domestically and to a select number of international destinations. Shipping times depend on your location. If you live down the street from us in New York, you'll get it faster than if you live in Hawaii. The USPS site quotes, but does not guarantee, 2.8 business days for domestic delivery. International shipping is longer. Personalized {custom) orders take 6.8 weeks to create and deliver because they are mode-to-order. ";

    protected $helpMethod;
    protected $helpText;

    public function __construct(){
        parent::__construct();
        $this->helpMethod ="";
        $this->helpText = "";
    }

    public function getHelpMethod($id){
        $this->dbh->query("SELECT helpMethod FROM editfaq WHERE `FAQ_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->helpMethod;
    }

    public function getHelpText($id){
        $this->dbh->query("SELECT helpText FROM editfaq WHERE `FAQ_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->helpText;
    }

    public function FAQ($id){
        $this->dbh->query("SELECT * FROM editfaq WHERE `helpMethod`=:helpMethod, `helpText`=:helpText, `FAQ_id`=:id");
        $this->dbh->bind(':helpMethod',$this->helpMethod);
        $this->dbh->bind(':helpText',$this->helpText);
        $this->dbh->bind(':id',$id);

        $result=$this->dbh->execute();
    }        

}

?>