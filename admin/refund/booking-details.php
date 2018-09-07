<?php 	include_once('../../config.php');   	
		include_once(ABS_PATH.'/admin/login_check.php');    
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function del_record(val)
{

	var r = confirm("Do you really want to delete record !");
	if (r == true) {    
	$.ajax({
	type: 'POST',
	url: "../ajax/default.php",
	//async: false,			 
	data: {del_city_names:1,val:val},	  
	success: function(ajaxresult){	     
		location.reload();	 	
	},
	error: function(XMLHttpRequest, textStatus, errorThrown) { 
	alert('Error');
	}
	});
	
	}	
	
}

</script>
		 
		<div class="col-md-10">  
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3>Booking Details </h3></div>
					
					 <div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='registered_users.php';" />
					</div>  
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
							 	<th>Email</th>  
								<th>Booking Type</th> 	
								<th>Amount</th>  
								<th>Payee TXN ID</th>  
								<th>Date</th>  
								<th>Status</th>  
								
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from member_orders where cust_id='$_REQUEST[cust_id]' ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  {  

									if($row->type==1)
									{
										$mys_result = mysql_query("select   fare,booking_date from bus_tickets where 	payee_txn_id='$row->payee_txn_id'  ");
										$myresult  = mysql_fetch_row($mys_result);
										
										$booking_type = "Bus Booking";
										$amount = $myresult[0];
										$payee_txn_id = $row->payee_txn_id; 
										$status = "Booked";
										$date = $myresult[1];
									}
									
									if($row->type==2)
									{
										$mys_result = mysql_query("select   date,type,amount,status from recharge where 	payee_txn_id='$row->payee_txn_id'  ");
										$myresult  = mysql_fetch_object($mys_result);
										
																				if($myresult->type==1)
										{										 
											$Type = "Prepaid Mobile";
										} 

										else if($myresult->type==2)
										{										 
										$Type = "DTH";
										} 

										else if($myresult->type==3)
										{										 
										$Type = "Datacard";
										} 

										else if($myresult->type==4)
										{										 
										$Type = "Post Paid";
										} 

										else if($myresult->type==5)
										{
										$Type = "STV";
										} 

										else if($myresult->type==6)
										{
										$Type = "Landline";
										} 

										else if($myresult->type==7)
										{										 
										$Type = "Electricity";
										} 

										else if($myresult->type==8)
										{										 
										$Type = "Gas";
										} 

										else if($myresult->type==9)
										{										 
										$Type = "Life Insurance";
										} 	
										
										if($myresult->status==0)
											$status = "Fail";
										else if($myresult->status==1)
											$status= "Success";
										else if($myresult->status==2)
											$status = "Pending";		
										
										$booking_type = $Type." Recharge";
										$amount = $myresult->amount;
										$payee_txn_id = $row->payee_txn_id;  
										$date = $myresult->date;
									}
								
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $_REQUEST['email'];?> </td>
								<td><?php echo $booking_type ;?> </td>
								<td><?php echo $amount;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /> </td>
								<td><?php echo $payee_txn_id ;?> </td>
								<td><?php echo $date ;?> </td>
								<td><?php echo $status;?>  </td>  
							</tr>  
							<?php } ?>
						</tbody>
					</table>
  				</div>
  			</div>



		  </div>
		</div>
    </div>

<?php  include ABS_PATH.'/admin/footer.php';	?>    