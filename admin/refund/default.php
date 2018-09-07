<?php 	include_once('../../config.php');   	
		include_once(ABS_PATH.'/admin/login_check.php');    
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function update_status(val)
{

	var r = confirm("Do you really want to update record !");
	if (r == true) {    
	$.ajax({
	type: 'POST',
	url: "../ajax/default.php",
	//async: false,			 
	data: {update_status:1,val:val},	  
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
					<div class="panel-title"><h3>Refund  Details</h3></div>
					
					<!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add New City " onClick="javascript:location.href='add_new.php';" />
					</div> -->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Name</th>  	 
								<th>Custom Id</th> 
								<th>Refund Amount</th>  
								<th>Update status</th>  
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from refund_amount where status=0 ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  {    
									$name_result = mysql_query("select name  from users where id=$row->user_id");
									$name = mysql_fetch_row($name_result);
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $name[0];?> </td> 
								<td><?php echo $row->cust_id;?> </td> 
								<td><?php echo $row->amount;?> </td> 
								<td><a href="javascript:void(0)" onclick="update_status(<?php echo $row->id;?>)">   <img src="<?php echo ADMINPATH;?>/images/update_staus_icon.png" title="View Details" /> </a> </td> 
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