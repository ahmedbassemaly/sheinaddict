<?php
class editFAQModel extends model{
//Database Connection
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
    public function setHelpMethod($helpMethod){
        $this->helpMethod = $helpMethod;
    }

    public function getHelpText($id){
        $this->dbh->query("SELECT helpText FROM editfaq WHERE `FAQ_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->helpText;
    }
    public function setHelpText($helpText){
        $this->helpText = $helpText;
    }

    public function editFAQ($id){
        $this->dbh->query("UPDATE editfaq SET `helpText`=:helpText WHERE `FAQ_id`=:id ");
        // $this->dbh->bind(':helpMethod',$this->helpMethod);
        $this->dbh->bind(':helpText',$this->helpText);
        $this->dbh->bind(':id',$id);

        $result=$this->dbh->execute();
    }
}
?>