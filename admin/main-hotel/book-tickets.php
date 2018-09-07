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
					<div class="panel-title"><h3> Confirmed Hotel Booking </h3></div>
					
					<!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add New City " onClick="javascript:location.href='add_new.php';" />
					</div> -->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>BookingId</th> 
								<th>Hotel Name</th> 
								<th>Booked Date</th> 
								<th>Amount</th> 
								<th>Email</th>  
								<th>Payee TXN Id</th>  
								<th>Detail</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from hotel_main_details where user_type=0  ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  { 
										if($row->cust_id!='')
										{
											$rst = mysql_query("select email from users where cust_id='$row->cust_id' ");	
											$user_name =mysql_fetch_row($rst);
											$email_id = $user_name[0];
										} else {
											$rst = mysql_query("select email from txn_details where txnid='$row->payee_txn_id' ");	
											$user_name =mysql_fetch_row($rst);
											$email_id = $user_name[0];
										} 	
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row->BookingId;?> </td>
								<td><?php echo $row->HotelName;?> </td>
								<td><?php echo $row->date_journy;?> </td>
								<td><?php echo $row->total_fare;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /></td>
								<td><?php  echo $email_id;?> </td>
								<td><?php echo $row->payee_txn_id;?> </td>	
								<td><a href="details.php?id=<?php echo $row->id;?>&payee_txn_id=<?php echo $row->payee_txn_id;?>">  <img src="<?php echo ADMINPATH;?>/images/view_details.png" /> </a> </td> 
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