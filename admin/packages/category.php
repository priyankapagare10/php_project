<?php 	include_once('../../config.php');
		include_once(ABS_PATH.'/admin/login_check.php');   
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  

<script>
function del_record(val)
{

	 
	
}

</script>
		 
		<div class="col-md-10">  
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><h3> Packages Category </h3></div>
					
					 <div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add Category " onClick="javascript:location.href='category-add.php';" />
					</div>  
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Category Nme</th>  	 
								<th>Image</th>  
								<th>Status</th>  
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from pck_category  ");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  { 
										 
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row->name;?> </td>  
								<td> <img src="<?php echo ROOTPATH;?>/uploads/packages-category/<?php echo $row->image;?>" width="50" height="50" /> </td> 
								<td><?php if($row->is_active==1) echo 'Active'; else echo 'Inactive'; ?></td> 
								<td>
									<a href="category-edit.php?id=<?php echo $row->id;?>"><img src="<?php echo ADMINPATH;?>/images/edit_detail.jpg"  title="Edit Details"/>
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