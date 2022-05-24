<?php

class measurementModel extends model{


    public function getTitle(){
        $word="Measurement chart";
        $this->dbh->query("SELECT title FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->title;
    }


    public function getSubtitle_1(){
        $word="Measurement chart";
        $this->dbh->query("SELECT subtitle_1 FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->subtitle_1;
    }

    public function getSubtitle_2(){
        $word="Measurement chart";
        $this->dbh->query("SELECT subtitle_2 FROM editfaq WHERE `helpMethod`=:word");
        // $this->dbh->bind(':id',$id);
        $this->dbh->bind(':word',$word);
        return$this->dbh->resultFetchCol();
        
    }

    public function getText(){
        $word="Measurement chart";
        $this->dbh->query("SELECT text FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->text;
    }

    public function getImage($id){
        $this->dbh->query("SELECT image FROM editfaq WHERE `FAQ_id`=:id");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->image;
    }

    public function FAQ(){

        $word="Measurement chart";
        
        $this->dbh->query("SELECT title, subtitle_1, subtitle_2, text FROM editfaq WHERE `helpMethod`='Measurement chart';");
        
            // $this->dbh->bind(':title',$this->title);
            // $this->dbh->bind(':subtitle_1',$this->subtitle_1);
            // $this->dbh->bind(':subtitle_2',$this->subtitle_2);
            // $this->dbh->bind(':text',$this->text);
            // $this->dbh->bind(':id',$id);

            // $result=$this->dbh->execute();
            // if ($result) {
            //     $results=$result->fetchAll(PDO::FETCH_COLUMN);
            // }
            // else {
            //      echo"ERROR 404";
            // }
            // $row=$result->fetchAll();
    }        

}

?>