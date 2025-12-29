<?php include("../config/db.php"); ?>
<form method="post">
    <input type="text" name="subject" placeholder="Subject" required>
    <textarea name="description" placeholder="Describe your issue"></textarea>
    <button name="submit">Submit Ticket</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $desc = $_POST['description'];
    $uid = $_SESSION['user_id'];

    mysqli_query($conn,
        "INSERT INTO tickets (user_id, subject, description, status)
         VALUES ($uid, '$subject', '$desc', 'Open')"
    );
    echo "Ticket Created!";
}
?>
