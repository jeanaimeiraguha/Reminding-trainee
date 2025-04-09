<?php
session_start();
include('conn.php');

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('All fields are required');</script>";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        
        if (mysqli_num_rows($check) == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
