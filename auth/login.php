<?php
include("../config/db.php");

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);

if ($user && $password == $user['password']) {

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    // 🚀 REDIRECT BASED ON ROLE
    if ($user['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        header("Location: ../user/my_tickets.php");
        exit();
    }

} else {
    echo "Invalid email or password";
}
?>
