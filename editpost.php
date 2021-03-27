<?php 
require_once 'db/conn.php';

//Get values from post operation
if (isset($_POST["submit"])) {

    //extract values from the $_POST array
        $id = $_POST['id'];
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $speciality = $_POST['speciality'];

        //call crud function
        $result=$crud->editAttendee($id,$fName, $lName, $dob, $email, $contact, $speciality);

        //redirect to inswx.php
        if($result){
            header("Location:viewRecords.php");
        }else{
            include 'includes/errorMessage.php';

        }
}else{
    include 'includes/errorMessage.php';


}    



?>