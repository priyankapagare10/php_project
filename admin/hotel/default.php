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
					<div class="panel-title"><h3> Hotel List</h3></div>
					
					<!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add New City " onClick="javascript:location.href='add_new.php';" />
					</div>-->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Hotel Name</th> 
								<th>Status</th> 
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from hotel_detail    order by is_active  "); 
								  $sr=1;
								  while($row = mysql_fetch_object($result))
								  {
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row->hotel_name; ?></td> 
								<td><?php if($row->is_active==1) echo 'Active'; else echo 'Inactive'; ?></td> 
								<td class="center" > 
								<a   href="edit.php?id=<?php echo $row->id; ?>"><img src="<?php echo ADMINPATH;?>/images/edit_detail.jpg" title="Edit Record"/>
								</a>  
								
								<a href="details.php?id=<?php echo $row->id; ?>"> <img src="<?php echo ADMINPATH;?>/images/view_details.png" title="View Detail"/>
								</a> 
							     </td> 
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