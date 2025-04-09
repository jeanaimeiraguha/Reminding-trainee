<?php
include('conn.php');

if (isset($_POST['add'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username)) {
        echo "<script>alert('Username cannot be empty');</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password cannot be empty');</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('Password should be at least 8 characters long');</script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

        if ($insert) {
            header("Location: select.php");
            exit();
        } else {
            echo "Failed to insert: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert User</title>
</head>
<body>
    <form action="" method="post">
        Username <input type="text" name="username" required><br><br>
        Password <input type="password" name="password" required><br><br>
        <button name="add">Insert</button>
    </form>
</body>
</html>
