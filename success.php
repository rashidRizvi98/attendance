<?php
$title = "Index";
require_once "includes/header.php";
require_once 'db/conn.php';

if (isset($_POST["submit"])) {
//extract values from the $_POST array
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['speciality'];

        $origFile = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $targetDir = 'uploads/';
        $destination = "$targetDir$contact.$ext";
        move_uploaded_file($origFile,$destination);




//call function to insert and track if success or nnt

    $isSuccess = $crud->insert($fName, $lName, $dob, $email, $contact, $speciality,$destination);
    $specialityName = $crud->getSpecialityById($speciality);
        
    if ($isSuccess) {
      include 'includes/successMessage.php';

    } else {
      include 'includes/errorMessage.php';


    }

}

?>

<img src="<?php echo $destination;?>" alt="" class="rounded-circle" style="width:20%; height:20%" >
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
    <?php echo $_POST['firstName'] . '' . $_POST['lastName']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php echo $specialityName['name']; ?></h6>
    <p class="card-text">Date Of Birth :
    <?php echo $_POST['dob']; ?></p>
    <p class="card-text">Email :
    <?php echo $_POST['email']; ?></p>
    <p class="card-text">Contact Number :
    <?php echo $_POST['phone']; ?></p>

  </div>
</div>




<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
