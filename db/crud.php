<?php
class crud
{
    //private database object
    private $db;

    //constructor to initialize private varialbe to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($fName, $lName, $dob, $email, $contact, $speciality)
    {

        try {
            //define sql statement to be executed
            $sql = "INSERT INTO attendee (firstName,lastName,dateOfBirth,emailAddress,contactNumber,specialityId) VALUES (:fName,:lName,:dob,:email,:contact,:speciality)";

            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);

            //bind all placeholders to the actual values

            $stmt->bindparam(':fName', $fName);
            $stmt->bindparam(':lName', $lName);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);

            //execute statement
            $stmt->execute();
            return true;

        } catch (\throwable $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function editAttendee($id,$fName, $lName, $dob, $email, $contact, $speciality){

        try{
            $sql = "UPDATE `attendee` SET `firstName`=:fName,`lastName`=:lName,`dateOfBirth`=:dob,`emailAddress`=:email,`contactNumber`=:contact,`specialityId`=:speciality WHERE attendeeId = :id";    
            $stmt = $this->db->prepare($sql);
    
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fName', $fName);
            $stmt->bindparam(':lName', $lName);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);
    
            $stmt->execute();
                return true;
    

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        }



    }


    public function getAttendees(){

        try {
            $sql="SELECT * FROM `attendee` a inner join specialities s on a.specialityId=s.specialityId";
            $result=$this->db->query($sql);
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        }

    }

    public function getAttendeeDetails($id){

        try {
            $sql= "select * from attendee a inner join specialities s on a.specialityId=s.specialityId where attendeeId = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        }




    }


    public function deleteAtttendee($id){

        try {
            $sql="delete from attendee where attendeeId= :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;    
        } catch (PDOException $e) {
            echo $s->getMessage();
            return false;
        }


    }


    public function getSpecialities(){
  
        try {
            $sql="SELECT * FROM `specialities`";
            $result=$this->db->query($sql);
            return $result;        } catch (\Throwable $e) {
            # code...
        } catch (PDOException $e) {
            echo $s->getMessage();
            return false;
        }
  


    }

}
?>