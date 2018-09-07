<?php 

require_once 'config.php';

?>

<html>
<head>
<title>PDO Examples</title>
</head>

<body>
<form method="post" action="index.php">

<a href="add.php">Add New Record</a><br><br>
<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php 
    
     $stmt=$con->prepare("select * from student order by id ASC");
     $stmt->execute();
     $results=$stmt->fetchAll();
     foreach ($results as $row)
     {
    ?>

    <tr>
      <td><?=$row['id'];?></td>
      <td><?=$row['fname'];?></td>
      <td><?=$row['lname'];?></td>
      <td><?=$row['age'];?></td>
      <td>
        <a href="edit.php?id=<?=$row['id'];?>">Edit</a>
        <a href="delete.php?id=<?=$row['id'];?>">Delete</a>      
      </td>
    </tr>
    <?php 
     }      
    ?>
</table>
</form>
</body>
</html>