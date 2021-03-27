<?php
$title = "View Records";
require_once "includes/header.php";
require_once "includes/authCheck.php";
require_once 'db/conn.php';

$results=$crud->getAttendees();

?>

<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Speciality</th>
        <th>Actions</th>
    </tr>
    <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php echo $r['attendeeId'] ?></td>
        <td><?php echo $r['firstName'] ?></td>
        <td><?php echo $r['lastName'] ?></td>
        <td><?php echo $r['name'] ?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendeeId'] ?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendeeId'] ?>" class="btn btn-warning">Edit</a>
            <a  href="delete.php?id=<?php echo $r['attendeeId'] ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>


    <?php }?>
 </table>


<br>
<br>
<br>
<br>

    <?php require_once "includes/footer.php";?>
