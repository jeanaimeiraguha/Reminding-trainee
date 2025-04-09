//UPDATE FILE IS COMING SOON
//Let's  get relax



<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['password'];
    } else {
        echo "User not found.";
        exit();
    }
}

if (isset($_POST['update'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $id = $_POST['id'];

    if (empty($username)) {
        echo "<script>alert('Username cannot be empty');</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password cannot be empty');</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long');</script>";
    } else {
        $update = mysqli_query($conn, "UPDATE users SET username='$username', password='$password' WHERE id=$id");

        if ($update) {
            header("Location: select.php");
            exit();
        } else {
            echo "Failed to update: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Username: <input type="text" name="username" value="<?php echo $username; ?>" required><br><br>
        Password: <input type="password" name="password" value="<?php echo $password; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
