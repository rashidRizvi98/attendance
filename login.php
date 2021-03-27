<?php
$title = "User Login";
require_once "includes/header.php";
require_once 'db/conn.php';

//If Data was submitted via a form POST request, then
if( $_SERVER["REQUEST_METHOD"]=="POST"){
    $userName=strtolower(trim( $_POST["userName"]));
    $password= $_POST["password"];
    $new_password=md5($password.$userName);

    $result=$user->getUser($userName,$new_password);
    if(!$result){
        echo '<div class="alert alert-danger">User Name or password is incorrect</div>';
    }else{
        $_SESSION["userName"]=$userName;
        $_SESSION["userId"]=$result["id"];
        header("Location: viewRecords.php");
    }
}


?>
<h1 class="text-center"><?php echo $title?></h1>


<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
    <table class="table table-sm">
        <tr>
            <td><label for="userName">UserName: *</label></td>
            <td><input type="text" 
            name="userName" 
            class="form-control"
            id="userName"
            value="<?php if( $_SERVER["REQUEST_METHOD"]=='POST') echo $_POST["userName"]; ?>"></td>
        </tr>
        <tr>
            <td><label for="password">Password: *</label></td>
            <td><input type="password" 
            name="password" 
            class="form-control"
            id="password"></td>
        </tr>
    </table>
    <br><br>
    <input type="submit" value="Login" class="btn btn-primary btn-block"><br>
    <a href="#">Forgot Password</a>
</form>

<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
