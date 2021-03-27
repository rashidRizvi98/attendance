
<?php
$title = "Index";
require_once "includes/header.php";
require_once 'db/conn.php';

$results=$crud->getSpecialities();

?>

    <h1 class="text-center">Registration for IT Conference</h1>

 <form method="post" action="success.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input required type="text" class="form-control" id="firstName" name="firstName" >
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input required type="text" class="form-control" id="lastName" name="lastName" >
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob"  >
    </div>
    <div class="form-group">
        <label for="speciality">Area Of Expertise</label>
        <select class="form-control" id="speciality" name="speciality">
        <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>  
            <option value="<?php echo $r['specialityId'] ?>"><?php echo $r['name'] ?></option>
 

        <?php }?>  
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" >
        <small id="phoneHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <br>
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
        <label for="avatar" class="custom-file-label">Choose File</label>     
        <small id="phoneHelp" class="form-text text-muted">Photo upload is optional</small> 
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>

<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
