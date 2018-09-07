<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');  

			if(isset($_POST['submit']))
			{
				mysql_query("insert into custom_city_name (name) values('$_POST[city]') ");					
				 
				header("Location:  default.php "); 
				$msg = "Product has been added successfully..";			
			}  
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  


 <script>
	$(function() {
		$( "#datepicker" ).datepicker(); 
	}); 
  
	$(document).ready(function()
	{   

	
	$("#product_frm").validate({
		
		errorElement:'div',
		rules:{ 
			city:{
				required:true				 
			} 
			
			
			
		},
		messages:{				
			 
			 city:{
				required:"Enter city name"				 
			} 
		}
	});


	});
 


</script>
		 
		 <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
							<div class="panel-heading">
							
							<?php 
							
								 $result = mysql_query("select * from bus_tickets where id=$_REQUEST[id] "); 
								 $row = mysql_fetch_object($result);
								 
								 $result_payee = mysql_query("select * from txn_details where txnid='$_REQUEST[payee_txn_id]' "); 
								 $payee_details = mysql_fetch_object($result_payee);
							?>
							<div class="panel-title"> Ticket Details of  Mr/Miss  <?php echo $payee_details->firstname;?>  </div>    
								
								<div class="panel-options">  
								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='book-tickets.php';" /> 
								</div>  
							</div>
							
							
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Ticket No</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->ticket_no;?></h5>
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Route</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->route;?></h5>
								    </div> 
								 </div>	 
								  <hr>  
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Date Of Journy</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->date_journy;?></h5>
								    </div> 
								 </div>
								 <hr>  
								 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Booking Date</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->booking_date;?></h5>
								    </div> 
								 </div>	 	
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Fare</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->fare;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /></h5>
								    </div> 
								 </div>	 
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Payee TXN Id</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->payee_txn_id;?></h5>
								    </div> 
								 </div>	 
								   
								   
								</form>
								
								
							
			  				</div>
			  			</div>
	  				</div>
	  				 
	  			</div>

	  			 


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  