<?php include("../config/db.php"); ?>

<h2>All Tickets</h2>

<?php
$result = mysqli_query($conn, "SELECT * FROM tickets");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>
        <a href='view_ticket.php?id={$row['id']}'>
        {$row['subject']} - {$row['status']}
        </a>
    </p>";
}
?>
