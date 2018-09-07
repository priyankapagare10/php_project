<?php 	include_once('../../config.php');   	
		include_once(ABS_PATH.'/admin/login_check.php');    
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function active_status(id,status)
{

	$.ajax({
	type: 'POST',
	url: "../ajax/default.php",
	//async: false,			 
	data: {enquiery:1,id:id,status:status},	  
	success: function(ajaxresult)
	{	     
		location.reload();	 	
	},
	error: function(XMLHttpRequest, textStatus, errorThrown) { 
	alert('Error');
	}
	});
	
}

</script>
		 
		<div class="col-md-10">  
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3> Hotel Enquiery </h3></div>
					
					<!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add New City " onClick="javascript:location.href='add_new.php';" />
					</div> -->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Name</th>  	
								<th>Contact</th> 
								<th>Guest</th> 
								<th>Check In</th> 
								<th>Check Out</th> 
								<th>Message</th>   
								<th>Action</th>   
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from enquery where type =1 ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  {  
									 
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row->name;?> </td>
								<td><?php echo $row->contact;?>  </td>
								<td><?php echo $row->guest;?> </td>
								<td><?php echo $row->chck_in;?> </td>
								<td><?php echo $row->chck_out;?> </td>
								<td><?php echo $row->message;?> </td>   
								<td><?php  if( $row->is_active==0) { ?> <a href="javascript:void(0)"  onclick="active_status(<?php echo $row->id;?>,1)"/> New Enquiery </a>   <?php  } else { ?> <a href="javascript:void(0)"  onclick="active_status(<?php echo $row->id;?>,0)"/> Completed </a>  <?php } ?>  </td>   
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