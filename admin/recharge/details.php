<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');  

			  
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
							
								 $result = mysql_query("select * from recharge where id=$_REQUEST[id] "); 
								 $row = mysql_fetch_object($result);
								 
								 $result_payee = mysql_query("select * from txn_details where txnid='$_REQUEST[payee_txn_id]' "); 
								 $payee_details = mysql_fetch_object($result_payee);
								 
										if($row->type==1)
										{										 
											$Type = "Prepaid Mobile";
										} 

										else if($row->type==2)
										{										 
										$Type = "DTH";
										} 

										else if($row->type==3)
										{										 
										$Type = "Datacard";
										} 

										else if($row->type==4)
										{										 
										$Type = "Post Paid";
										} 

										else if($row->type==5)
										{
										$Type = "STV";
										} 

										else if($row->type==6)
										{
										$Type = "Landline";
										} 

										else if($row->type==7)
										{										 
										$Type = "Electricity";
										} 

										else if($row->type==8)
										{										 
										$Type = "Gas";
										} 

										else if($row->type==9)
										{										 
										$Type = "Life Insurance";
										} 	
										
										if($row->status==0)
											$sts = "Fail";
										else if($row->status==1)
											$sts = "Success";
										else if($row->status==2)
											$sts = "Pending";	
							?>
							
								<div class="panel-title"> Order Details Of Transaction ID -  <?php echo $_REQUEST['txn_id'];?>  </div>    
									
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='paid_orders.php';" /> 
								</div>  
								
							</div>  
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Order By</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $payee_details->firstname;?></h5>
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->amount;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /></h5>
								    </div> 
								 </div>	 
								  <hr>  
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Number</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->mobile;?></h5>
								    </div> 
								 </div>
								 <hr>  
								 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $Type;?></h5>
								    </div> 
								 </div>	 	
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
								      <h5><?php echo $sts;?> </h5>
								    </div> 
								 </div>	 
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Order Date</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->date;?></h5>
								    </div> 
								 </div>	 
								 <hr> 
								 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Payee TXN ID</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->payee_txn_id;?></h5>
								    </div> 
								 </div>	
								 
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Operator</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->operator;?></h5>
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