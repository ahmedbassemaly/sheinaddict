<?php
class editPaymentModel extends model{

    protected $title;
    protected $text = [];
    protected $image;

    public function __construct(){
        parent::__construct();
        $this->title = "";
        $this->text = array();
        $this->image = "";
    }
//Database Connection
    public function getTitle(){
        $word="Payment";
        $this->dbh->query("SELECT title FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getText($id){
        $this->dbh->query("SELECT text FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->text;
    }

    public function setText($text){
        $this->text = $text;
    }

    public function getImage($id){
        $this->dbh->query("SELECT image FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function editShipping($id){

        $this->dbh->query("UPDATE editfaq SET `title`=:title, `text`=:text ,`image`=:image WHERE `FAQ_id`=:id");
        $this->dbh->bind(':title',$this->title);
        $this->dbh->bind(':text',$this->text);
        $this->dbh->bind(':image',$this->image);
        $this->dbh->bind(':id',$id);

        $result= $this->dbh->execute();
    }       
}
?>