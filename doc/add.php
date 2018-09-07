<?php 

require_once 'config.php';

if (isset($_POST['insert']))
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	
	//if (!empty($id))
	//{
		try
	   {
	   	 $stmt=$con->prepare("insert into student(id,fname,lname,age)values(:id,:fname,:lname,:age)");
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

?>

<html>
<head>
<title>PDO Examples</title>
</head>

<body>
<form method="post" action="add.php">



<table>
    <tr>
      <td>Id</td>
      <td><input type="text" name="id" placeholder="Id"></td>
   </tr>
   <tr>
      <td>First Name</td>
      <td><input type="text" name="fname" placeholder="First Name"></td>
   </tr>
   <tr>
      <td>Last Name</td>
      <td><input type="text" name="lname" placeholder="Last Name"></td>
   </tr>
   <tr>
      <td>Age</td>
      <td><input type="text" name="age" placeholder="Age"></td>
   </tr>
   <tr>
      <td><input type="submit" name="insert" value="Insert"></td>
      <td><input type="submit" name="delete" value="Delete"></td>
      <td><input type="submit" name="update" value="Update"></td>
      <td><input type="submit" name="search" value="Search"></td>      
   </tr>
</table>
</form>
</body>
</html>
