<?php 

require_once 'config.php';

if (isset($_POST['edit']))
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	
	//if (!empty($id))
	//{
		try
	   {
	   	 $stmt=$con->prepare("update student set fname=:fname,lname=:lname,age=:age where id=:id");
	   	 $stmt->execute(array(':id'=>$id,':fname'=>$fname,':lname'=>$lname,':age'=>$age));
	     header("Location:index.php");
	   	
	   }
	   catch(PDOException $e)
      {
        echo $e->getMessage();
      }
	//}  
	//else 
	//{
	//	echo "";
	//}
}

$id='';
$fname='';
$lname='';
$age='';

if (isset($_GET['id']))
{
	$id=$_GET['id'];
	$stmt=$con->prepare("select * from student where id=:id");
	$stmt->execute(array(':id'=>$id));
	$row=$stmt->fetch();
	$id=$row['id'];
	//echo $id;
	$fname=$row['fname'];
	$lname=$row['lname'];
	$age=$row['age'];
	//header("Location:index.php");
}

?>

<html>
<head>
<title>PDO Examples</title>
</head>

<body>
<form method="post" action="edit.php">



<table>
    <tr>
      <td>Id</td>
      <td><input type="text" name="id" placeholder="Id" value="<?php echo $row['id'];?>" ></td>
   </tr>
   <tr>
      <td>First Name</td>
      <td><input type="text" name="fname" placeholder="First Name" value="<?php echo $row['fname'];?>"></td>
   </tr>
   <tr>
      <td>Last Name</td>
      <td><input type="text" name="lname" placeholder="Last Name" value="<?php echo $row['lname'];?>"></td>
   </tr>
   <tr>
      <td>Age</td>
      <td><input type="text" name="age" placeholder="Age" value="<?php echo $row['age'];?>"></td>
   </tr>
   <tr>
     <td><input type="submit" name="edit" value="Edit"></td>
   </tr>
</table>
</form>
</body>
</html>

