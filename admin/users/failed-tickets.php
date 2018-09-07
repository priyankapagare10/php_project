<?php 	include_once('../../config.php');   	
		include_once(ABS_PATH.'/admin/login_check.php');    
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function clearing(val)
{

	var r = confirm("Do you really want to clear  record !");
	if (r == true) {  
	$.ajax({
	type: 'POST',
	url: "../ajax/default.php",
	//async: false,			 
	data: {payment_clearing:1,id:val},	  
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
					<div class="panel-title"><h3>Failed Services/ Booking List </h3></div>
					
					 <!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='registered_users.php';" />
					</div>  -->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
							 	<th>Name</th>  
							 	<th>Email</th>  
								<th>Booking Type</th> 	
								<th>Amount</th>  
								<th>Payee TXN ID</th>  
								<th>Booking Date </th>  
								<th>Status</th>  
								
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from member_orders   ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  {  
								
									$show = 0;
									if($row->type==1)
									{
										$booking_type = 'Bus Booking';
										$mys_result = mysql_query("select * from  bus_tickets where 	payee_txn_id='$row->payee_txn_id'  ");
										if(mysql_num_rows($mys_result) < 1)
										 $show = 1;
									}
									
									if($row->type==2)
									{
										$booking_type = 'Recharge';
										$mys_result = mysql_query("select * from  recharge where 	payee_txn_id='$row->payee_txn_id'  ");
										if(mysql_num_rows($mys_result) < 1)
										 $show = 1;
									}
									
									
									if($row->type==3)
									{
										$booking_type = 'Flight';
										$mys_result = mysql_query("select * from  flight_details where 	payee_txn_id='$row->payee_txn_id'  ");
										if(mysql_num_rows($mys_result) < 1)
										 $show = 1;
									}
									
									if($row->type==4)
									{
										$booking_type = 'Hotels';
										$mys_result = mysql_query("select * from  hotel_main_details where 	payee_txn_id='$row->payee_txn_id'  ");
										if(mysql_num_rows($mys_result) < 1)
										 $show = 1;
									}
									
									
									if($show==1)
									{ 	 
									  $mys_result = mysql_query("select * from  txn_details where 	txnid='$row->payee_txn_id'  ");
									  $record = mysql_fetch_object($mys_result);
									   
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $record->firstname;?> </td>
								<td><?php echo $record->email;?> </td>
								<td><?php echo $booking_type ;?> </td>
								<td><?php echo $record->net_amount_debit;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /> </td>
								<td><?php echo $row->payee_txn_id;?> </td>
								<td><?php echo $record->order_date ;?> </td>
								<td> 
								<?php if($record->clearing==0)
									{
								?>
								<a  href="javascript:void(0)" onclick="clearing(<?php echo $record->id;?>)">  Uncleared </a>
								<?php 
									}else{
								?>
									Cleared 
								<?php } ?>
								</td>  
							</tr>  
							<?php 
									 
								  }   
								}	
							?>
						</tbody>
					</table>
  				</div>
  			</div>



		  </div>
		</div>
    </div>

<?php  include ABS_PATH.'/admin/footer.php';	?>    