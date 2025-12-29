<?php include("../config/db.php");
$id = $_GET['id'];
?>

<form method="post">
    <select name="status">
        <option>Open</option>
        <option>In Progress</option>
        <option>Resolved</option>
        <option>Closed</option>
    </select>
    <button name="update">Update Status</button>
</form>

<?php
if (isset($_POST['update'])) {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE tickets SET status='$status' WHERE id=$id");
}
?>
