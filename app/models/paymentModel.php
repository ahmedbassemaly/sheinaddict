<?php

class paymentModel extends model{


    public function getTitle(){
        $word="Payment";
        $this->dbh->query("SELECT title FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->single()->title;
    }


    public function getText(){
        $word="Payment";
        $this->dbh->query("SELECT text FROM editfaq WHERE `helpMethod`=:word");
        $this->dbh->bind(':word',$word);
        return $this->dbh->resultFetchCol();
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

            $result=$this->dbh->execute();
            if ($result) {
                $results=$result->fetchAll(PDO::FETCH_COLUMN);
            }
            else {
                 echo"ERROR 404";
            }
            // $row=$result->fetchAll();
    }        

}

?>