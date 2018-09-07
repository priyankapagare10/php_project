<?php 	include_once('../../config.php');
		include_once(ABS_PATH.'/admin/login_check.php');   
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function del_record(val)
{

	var r = confirm("Do you really want to delete package!");
	if (r == true) {    
	$.ajax({
	type: 'POST',
	url: "../ajax/default.php",
	//async: false,			 
	data: {del_full_pck:1,val:val},	  
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
					<div class="panel-title"><h3> Packages List </h3></div>
					
					 <div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add Package " onClick="javascript:location.href='add_pak.php';" />
					</div>  
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Category</th>  	
								<th>Package Name</th>  	
								<th>Seller Name</th> 
								<th>Starting Price</th>  
								<th>Status  </th>  
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from pck_list  ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  { 
									 $result1 = mysql_query("select name from pck_category where id=$row->cat_id ");
									 $row1 = mysql_fetch_object($result1);
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row1->name;?> </td>
								<td><?php echo $row->pck_name;?> </td>
								<td><?php echo $row->seller_name;?>  </td>
								<td><?php if($row->is_active==1) echo 'Active'; else  echo 'Inactive'; ?>  </td>
								<td><?php echo $row->st_price;?> </td> 
								<td>
									<a href="edit_pck.php?id=<?php echo $row->id;?>"><img src="<?php echo ADMINPATH;?>/images/edit_detail.jpg"  title="Edit Details"/>  </a>   
									
									<a href="view_details.php?id=<?php echo $row->id;?>"><img src="<?php echo ADMINPATH;?>/images/<?php if($row->approved==1) echo 'approved'; else  echo 'ugmamlob'; ?>.png"  title="Approval"/>  </a> 
									
									<a href="javascript:void(0)"><img src="<?php echo ADMINPATH;?>/images/delete_icon.png"  title="Delete Packag" onclick="del_record(<?php echo $row->id;?>)"/>  </a> 
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