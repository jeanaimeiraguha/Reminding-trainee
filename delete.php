<?php
include("conn.php");
$id=$_GET["id"];
$delete=mysqli_query($conn,"DELETE FROM users where id='$id'");
if ($delete) {
     // echo " Deleted";
     header("location:select.php");
}
else{
     echo "not deleted";
}
?>