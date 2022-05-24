<?php
class editShippingModel extends model{

    protected $title;
    protected $subtitle_1 = [];
    protected $text = [];

    public function __construct(){
        parent::__construct();
        $this->title = "";
        $this->subtitle_1 = array();
        $this->text = array();
    }
//Database Connection
    public function getTitle(){
        $word="Shipping Policy";
        $this->dbh->query("SELECT title FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getSubtitle_1($id){
        // $word="Shipping Policy";
        $this->dbh->query("SELECT subtitle_1 FROM editfaq WHERE  `FAQ_id`=:id");
        // $this->dbh->bind(':word',$word);
        $this->dbh->bind(':id',$id);
        // $this->dbh->bind(':id',$id);
        return $this->dbh->single()->subtitle_1;
    }

    public function setSubtitle_1($subtitle_1){
        // foreach($this->subtitle_1 as $value){
        $this->subtitle_1 = $subtitle_1;
        // }
    }

    public function getText($id){
        // $word="Shipping Policy";
        $this->dbh->query("SELECT text FROM editfaq WHERE  `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->text;
    }

    public function setText($text){
        $this->text = $text;
    }


    public function editShipping($id){

        // for($i=0;$i<2;$i++){
            // $word="Shipping Policy";
            $this->dbh->query("UPDATE editfaq SET `title`=:title, `subtitle_1`=:subtitle_1,`text`=:text WHERE `FAQ_id`=:id");
            $this->dbh->bind(':title',$this->title);
            $this->dbh->bind(':id',$id);
            $this->dbh->bind(':subtitle_1',$this->subtitle_1);
            $this->dbh->bind(':text',$this->text);
            // $this->dbh->bind(':word',$helpMothod);
            // $this->dbh->bind(':subtitle_2',$this->subtitle_1);

            $result= $this->dbh->execute();
        // }
    }
}
?>