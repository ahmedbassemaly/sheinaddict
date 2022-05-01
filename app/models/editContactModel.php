<?php
class editContactModel extends Model{
 //Database Connection
 
    protected $contactImage; 
    protected $caption;
    protected $link; 

    public function __construct(){
        parent::__construct();
        $this->contactImage ="";
        $this->caption ="";
        $this->link ="";
    }

    public function getContactImage($id){
        $this->dbh->query("SELECT contactImage FROM contactus WHERE `contact_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->contactImage;
    } 
    public function setContactImage($contactImage){
        $this->contactImage = $contactImage;
    }

    public function getCaption($id){
        $this->dbh->query("SELECT caption FROM contactus WHERE `contact_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->caption;
    }
    public function setCaption($caption){
        $this->caption = $caption;
    }

    public function getLink($id){
        $this->dbh->query("SELECT link FROM contactus WHERE `contact_id`=:id ");
        $this->dbh->bind(':id',$id);
        return $this->dbh->single()->link;
    }
    public function setLink($link){
        $this->link = $link;
    }

 public function editContact($id){
     $this->dbh->query("UPDATE contactus SET `contactImage`=:contactImage,`caption`=:caption,`link`=:link WHERE `contact_id`=:id ");
     $this->dbh->bind(':contactImage',$this->contactImage);
     $this->dbh->bind(':caption',$this->caption);
     $this->dbh->bind(':link',$this->link);
     $this->dbh->bind(':id',$id);

     $result=$this->dbh->execute();
 }
}
?>