<?php 
require_once "includes/authCheck.php";
require_once 'db/conn.php';

if(!$_GET["id"]){
    include 'includes/errorMessage.php';

    header("Location:viewRecords.php");
}else{
    //get id values
    $id=$_GET["id"];

    //Call delete function
    $result=$crud->deleteAtttendee($id);

    //redirect to view records
    if($result){
        header("Location:viewRecords.php");
    }else{
        include 'includes/errorMessage.php';

    }
}

?>