<?php  
		include '../config.php';	   

		if(isset($_POST['submit']))
		{
					$stmt =  $conn->prepare("select * from admin WHERE  username=:username and password=:password ");         
					$stmt->bindValue(':username', $_REQUEST['username'], PDO::PARAM_STR); 
					$stmt->bindValue(':password', $_REQUEST['password'], PDO::PARAM_STR); 
					$stmt->execute();   
					$affected_rows = $stmt->rowCount(); 
					 
					
					if($affected_rows > 0)
					{     
						$_SESSION['admin_username']	 = $_POST['username'];
						$_SESSION['admin_password']	 = $_POST['password']; 
						//if($row->roll==1)
						{
							$_SESSION['admin1'] = 1;
							header("Location: ".ROOTPATH."/admin/users/default.php"); 
						}
					}    
		} 
?>  
<!DOCTYPE html>
<html>
  <head>
    <title>Simla Foods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
	<script src="<?php echo ROOTPATH;?>/admin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo ROOTPATH;?>/admin/js/jquery.validate.js"></script>  
	<script>  
	$(document).ready(function()
	{     
	 
		$("#product_frm").validate({

			errorElement:'div',
			rules:{ 
			username:{
				required:true				 
			},
			password:{
				required:true				 
			} 
			
			},
			messages:{	
			
				username:{
					required:"Enter username"				 
				},
				password:{
					required:"Enter password"		 
				}   
			}
		}); 

	}); 


</script>

  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <!--<div class="logo">
	                 <h1><a href="index.html">&nbsp;</a></h1>
	              </div>-->
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			           	<form   method="post"  id="product_frm">
								
						<div class="content-wrap">
			                <h6>Welcome</h6>
			                <input class="form-control" type="text" name="username" placeholder="Username">
			                <input class="form-control" type="password" name="password"  placeholder="Password"> 
			                <div class="action"> 
								<input type="submit" name="submit" value="Login"class="btn btn-primary signup"  />
			                </div>                
			            </div>
						</form>
			        </div>

			       <!--<div class="already">
			            <p>Have an account already?</p>
			            <a href="login.html">Login</a>
			        </div>-->
			    </div>
			</div>
		</div>
	</div>  
  </body>
</html>