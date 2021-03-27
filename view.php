<?php
$title = "View Record";
require_once "includes/header.php";
require_once 'db/conn.php';

//Get Attendee By ID
if(!isset($_GET['id'])){
  include 'includes/errorMessage.php';


}else{

    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);


?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
    <?php echo $result['firstName'] . '' . $result['lastName']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php echo $result['name']; ?></h6>
    <p class="card-text">Date Of Birth :
    <?php echo $result['dateOfBirth']; ?></p>
    <p class="card-text">Email :
    <?php echo $result['emailAddress']; ?></p>
    <p class="card-text">Contact Number :
    <?php echo $result['contactNumber']; ?></p>

  </div>
</div>
<br>
        <a href="viewRecords.php" class="btn btn-info">Back to list</a>
        <a href="edit.php?id=<?php echo $result['attendeeId'] ?>" class="btn btn-warning">Edit</a>
        <a  href="delete.php?id=<?php echo $result['attendeeId'] ?>" class="btn btn-danger">Delete</a>



<?php }
?>
<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
