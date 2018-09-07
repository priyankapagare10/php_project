<?php 

require_once 'config.php';

$id='';
$fname='';
$lname='';
$age='';

if (isset($_GET['id']))
{
	$id=$_GET['id'];
	$stmt=$con->prepare("delete from student where id=:id");
	$stmt->execute(array(':id'=>$id));
	header("Location:index.php");
}

?>

<html>
<head>
<title>PDO Examples</title>
</head>

<body>
<form method="post" action="delete.php">




</form>
</body>
</html>


