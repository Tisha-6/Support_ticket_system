<?php include("../config/db.php"); ?>

<h2>My Tickets</h2>
<a href="create_ticket.php">Create Ticket</a>

<?php
$uid = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tickets WHERE user_id=$uid");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>
        <a href='view_ticket.php?id={$row['id']}'>
        {$row['subject']} ({$row['status']})
        </a>
    </p>";
}
?>
