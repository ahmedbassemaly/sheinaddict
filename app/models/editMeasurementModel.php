<?php
class editMeasurementModel extends model{

    protected $title;
    protected $subtitle_1 = [];
    protected $subtitle_2 = [];
    protected $text = [];
    protected $image = [];

    public function __construct(){
        parent::__construct();
        $this->title = "";
        $this->subtitle_1 = array();
        $this->subtitle_2 = array();
        $this->text = array();
        $this->image = array();
    }
//Database Connection
    public function getTitle($id){
        $this->dbh->query("SELECT title FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getSubtitle_1($id){
        $this->dbh->query("SELECT subtitle_1 FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->subtitle_1;
    }

    public function setSubtitle_1($subtitle_1){
        $this->subtitle_1 = $subtitle_1;
    }

    public function getSubtitle_2($id){
        $this->dbh->query("SELECT subtitle_2 FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->subtitle_2;
    }

    public function setSubtitle_2($subtitle_2){
        $this->subtitle_2 = $subtitle_2;
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

    public function editMeasurement($id){

        $this->dbh->query("UPDATE editfaq SET `title`=:title, `subtitle_1`=:subtitle_2, `subtitle_2`=:subtitle_2, `text`=:text, `image`=:image  WHERE `FAQ_id`=:id");
        $this->dbh->bind(':title',$this->title);
        $this->dbh->bind(':subtitle_1',$this->subtitle_1);
        $this->dbh->bind(':subtitle_2',$this->subtitle_2);
        $this->dbh->bind(':text',$this->text);
        $this->dbh->bind(':image',$this->image);
        $this->dbh->bind(':id',$id);

        $result= $this->dbh->execute();
    }       
}
?>