<?php include("../config/db.php"); 
$id = $_GET['id'];
?>

<h2>Ticket Chat</h2>

<?php
$msgs = mysqli_query($conn, "SELECT * FROM messages WHERE ticket_id=$id");
while ($m = mysqli_fetch_assoc($msgs)) {
    echo "<p>{$m['message']}</p>";
}
?>

<form method="post">
    <textarea name="message"></textarea>
    <button name="send">Send</button>
</form>

<?php
if (isset($_POST['send'])) {
    $msg = $_POST['message'];
    $uid = $_SESSION['user_id'];

    mysqli_query($conn,
        "INSERT INTO messages (ticket_id, sender_id, message)
         VALUES ($id, $uid, '$msg')"
    );
    header("Refresh:0");
}
?>
