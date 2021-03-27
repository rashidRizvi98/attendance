
<?php
$title = "Edit Record";
require_once "includes/header.php";
require_once "includes/authCheck.php";
require_once 'db/conn.php';

$results=$crud->getSpecialities();

if(!isset($_GET["id"])){

    include 'includes/errorMessage.php';
    header("Location:viewRecords.php");
}else{

    $id=$_GET["id"];
    $attendee=$crud->getAttendeeDetails($id);



?>

    <h1 class="text-center">Edit Record</h1>

 <form method="post" action="editpost.php">

    <input type="hidden" 
    name="id"
    value="<?php echo $attendee['attendeeId']?>" >

    <div class="form-group">
        <label for="firstName">First Name</label>
        <input 
        type="text" 
        class="form-control" 
        id="firstName" 
        name="firstName"
        value="<?php echo $attendee['firstName']?>" >
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" 
        class="form-control" 
        id="lastName" 
        name="lastName"
        value="<?php echo $attendee['lastName']?>" >
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input 
        type="text" 
        class="form-control" 
        id="dob" 
        name="dob"
        value="<?php echo $attendee['dateOfBirth']?>"  >
    </div>
    <div class="form-group">
        <label for="speciality">Area Of Expertise</label>
        <select class="form-control" id="speciality" name="speciality">
        <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>  
            <option value="<?php echo $r['specialityId'] ?>" <?php if($r['specialityId']==$attendee['specialityId']) echo 'selected'?>>
            <?php echo $r['name'] ?></option>
 

        <?php }?>  
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input 
        type="email" 
        class="form-control" 
        id="email" 
        name="email" 
        aria-describedby="emailHelp"
        value="<?php echo $attendee['emailAddress']?>" >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input 
        type="text" 
        class="form-control" 
        id="phone" 
        name="phone" 
        aria-describedby="phoneHelp"
        value="<?php echo $attendee['contactNumber']?>" >
        <small id="phoneHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <a  href="viewRecords.php" class="btn btn-default btn">Back to list</a>
    <button type="submit" name="submit" class="btn btn-success btn">Submit</button>
</form>

<?php }
?>

<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
