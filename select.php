<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <a href="insert.php">Add</a>
  <table border="1">
     <tr>

          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th colspan="2">Actions</th>
     </tr>
     <?php
     include('conn.php');
     $select=mysqli_query($conn,"SELECT * FROM users");
     while($row=mysqli_fetch_array($select)){
     ?>
     <tr>
          <td><?php echo $row['id']?></td>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['Password']?></td>

  <td><a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
  <td><a href="update.php?id=<?php echo $row['id']?>">Update</a></td>
     </tr>
     <?php
     }?>
  </table>   
</body>
</html>