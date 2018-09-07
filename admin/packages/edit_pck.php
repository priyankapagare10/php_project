<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');   
		$pck_category_result = mysql_query("select * from pck_category "); 
		
		$_SESSION['pck'] = null; 
		if(isset($_POST['submit']))
		{    
			$_SESSION['pck']['pck_category'] =  $_POST['pck_category'];
			$_SESSION['pck']['pck_name'] =  $_POST['pck_name'];
			$_SESSION['pck']['days'] =  $_POST['days'];
			$_SESSION['pck']['nights'] =  $_POST['nights'];
			$_SESSION['pck']['start_price'] =  $_POST['start_price'];
			$_SESSION['pck']['seller_name'] =  $_POST['seller_name'];   
		}else
		{  
			$pck_result = mysql_query("select * from  pck_list  where id=$_REQUEST[id] ");
			$pck_details = mysql_fetch_object($pck_result);
			$_SESSION['inclusion'] = $pck_details->inclusion;
			$_SESSION['inclusion_list'] = $pck_details->inclusion_list;
		}			
		
		 include ABS_PATH.'/admin/header.php';
		 
		
?>    
<link rel="stylesheet" type="text/css" href="style.css">    
<script> 
$(document).ready(function()
{   

	$("#product_frm").validate({
		
			errorElement:'div',
			rules:{ 
				pck_name:{
					required:true				 
				} ,
				days:{
					required:true,
					number:true	
				} ,
				nights:{
					required:true,
					number:true	
				} ,
				start_price:{
					required:true,
					number:true	
				},
				seller_name:{
					required:true				 
				}            
			},
			messages:{				
				 
				  
			}
			
	});   
	



	/*for(i=0;i<$("#pic_id_val").val();i++)
	{ 
		
		$(id).click(function() 
		{   
			 
			
				
				$(this).hide();  
				
			}  
		});
	}*/
	
}); 


	
	
function remove_img(name,id)	
{    
	var r = confirm("Do you really want to delete image"); 
	if (r == true) 
	{      
		$.ajax({
			type: 'POST',
			url: "../ajax/default.php",
			//async: false,			 
			data: {delete_pck_img:1,name:name},	  
			success: function(ajaxresult){	     
				 
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert('Error');
			}    
		}); 
		$('#pic_id_remove'+id).hide(); 
	
	}

}
	
     
</script>
		 
		 <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-12">
					   <?php 
							if($_SESSION['pck']=='')
							{
					   ?>
						<div class="content-box-large">
							<div class="panel-heading">  
								<div class="panel-title"> <h2> Edit Package</h2> </div>     
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>   
							</div>  
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"    id="product_frm"> 
								<div class="form-group"> 
								
									<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
								    <div class="col-sm-10"> 
									  <!--<select name="pck_category" class="form-control" > -->
									  <select name="pck_category" class="btn btn-primary" > 
									  <?php 
										while($row = mysql_fetch_object($pck_category_result))
										{
									  ?>
									  <option value="<?php echo $row->id;?>" <?php if($pck_details->cat_id == $row->id) echo 'selected=selected'   ?> > <?php echo $row->name; ?> </option>
									<?php } ?> 
									  </select>  
								    </div> 
									
							 </div>   
								 <hr>  
									 
							<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Package Name</label>
								    <div class="col-sm-10">
								      <input  name="pck_name"  value="<?php echo $pck_details->pck_name;?>"/>
								    </div> 
							 </div>
							 <hr>  
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">No of Days</label>
								    <div class="col-sm-10">
								      <input  name="days" value="<?php echo $pck_details->days;?>" />
								    </div> 
								 </div>
								 <hr>  	
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">No of Nights</label>
								    <div class="col-sm-10">
								      <input  name="nights" value="<?php echo $pck_details->nights;?>" />
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Starting Price</label>
								    <div class="col-sm-10">
								      <input  name="start_price" value="<?php echo $pck_details->st_price;?>" />  <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" />
								    </div> 
								 </div>
								 <hr>  	
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Seller Name</label>
								    <div class="col-sm-10">
								      <input  name="seller_name" value="<?php echo $pck_details->seller_name;?>" />
								    </div>  
								 </div>
								 <hr>    
								 
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
								    <div class="col-sm-10">
								      <input  name="submit" value="Submit"  type="submit"  class="btn btn-warning"/>
								    </div> 
								 </div>  
								</form>   
			  				</div> 
			  			</div>
						
						<?php 
							}
							else{
								
								$pck_info  = mysql_query("select p.about_place,v.disc,v.dys_no from pck_list as p inner join pck_dy_vice_iternity  as v on  p.id = v.tripid where  p.id = $_REQUEST[id]   order by v.dys_no ");
								
								while($pck_info_data = mysql_fetch_object($pck_info))
									 $day_info[] = $pck_info_data->disc;    
								
								$ht = explode(",",$_SESSION['inclusion']);   
								if (in_array("1",$ht))  
									$inc1 = 1;
								else 
								$inc1 = 0;
							
								if (in_array("2",$ht))  
									$inc2 = 1;
								else 
								$inc2 = 0;
							
								if (in_array("3",$ht))  
									$inc3 = 1;
								else 
								$inc3 = 0;	
							
								if (in_array("4",$ht))  
									$inc4 = 1;
								else 
								$inc4 = 0;
							
								if (in_array("5",$ht))  
									$inc5 = 1;
								else 
								$inc5 = 0;    
						?>
						
						<div class="content-box-large">
							<div class="panel-heading">  
							<div class="panel-title"> <h2> Complete your package information </h2> </div>   
							
								<div class="panel-options">  
										   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>   
							</div>  
						 
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" action="upload_pck.php" enctype="multipart/form-data" id="info_form">   
							     <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Package Name</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['pck_name']; ?></h4>
								    </div>  
								 </div>  
								 <hr>  
								 
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Seller Name</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['seller_name']; ?></h4>
								    </div>  
								 </div>
								  
								 <hr>  
								  <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >No of Days</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['days']; ?></h4>
								    </div>  
								 </div>
								  
								 <hr>  
								   <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >No of Nights</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['nights']; ?></h4>
								    </div>  
								 </div>
								 
								 <hr>
							   <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Starting Price</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['start_price']; ?>  <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /> </h4> 
								    </div>  
								 </div>
								 
								 
								 <hr>  
								 
								
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Add Images</label>
								    <div class="col-sm-10">  
									
									
									<div class="abcd" >
										<?php 
											$tp_ID = mysql_query("select * from  pck_pic where tripid=$_REQUEST[id] ");
											$sr =0;
											while($rw = mysql_fetch_object($tp_ID))
											{ 
										?>  
										<div id="pic_id_remove<?php echo $sr;?>" >
											<img src="<?php echo ROOTPATH;?>/uploads/packages/<?php echo $rw->pic_name;?>"   /> 
										<span onclick="remove_img('<?php echo $rw->pic_name;?>',<?php echo $sr;?>)" > Remove</span>
										<br>
										</div>
										<?php $sr++;} ?>
										
										
										<input type="hidden" value="<?php echo $sr;?>" id="pic_id_val" />
										
									</div>
									 
									<input name="file[]" type="file" id="file"/> 
									
									<input type="button" id="add_more" class="upload" value="Add More Images" required="required" /> 
								    </div>  
								 </div>
								 <hr>  
								 
								 <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Inclusion</label>
								    <div class="col-sm-offset-2 col-sm-10">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox" value="1"  name="inclusion1"  <?php   if($inc1) echo 'checked=checked'; ?>> Flight
								        </label>
								      </div>
									  
								      <div class="checkbox">
								        <label>
								         <input type="checkbox" value="2"  name="inclusion2"  <?php   if($inc2) echo 'checked=checked'; ?>> Hotel
								        </label>
								      </div>
									  
									<div class="checkbox"> 
								        <label>
								         <input type="checkbox" value="3" name="inclusion3"  <?php   if($inc3) echo 'checked=checked'; ?>> Transfer
								        </label>
								      </div>

									 <div class="checkbox"> 
								        <label>
								         <input type="checkbox" value="4" name="inclusion4"  <?php   if($inc4) echo 'checked=checked'; ?>> Meal
								        </label>
								      </div>

									<div class="checkbox"> 
								        <label>
								         <input type="checkbox" value="5" name="inclusion5"  <?php   if($inc5) echo 'checked=checked'; ?>> Sightseeing
								        </label>
								    </div>	 

									<div class="checkbox">  
										<label>
										Label
										</label>
									
										</div>	  
								    </div>
									
								  </div> 
								 <hr>  
								 
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Inclusion in detail</label>
								    <div class="col-sm-10">   
									    <textarea class="form-control" placeholder="e.q.Return Economy Class Air Tickets , 02 Nights Accommodation at Paris"    required="required" rows="3" name="inclusion_list"> <?php echo $_SESSION['inclusion_list'];  ?> </textarea> <br>
										<span>Note : Add inclusion points seperated by commas (,) it will displyed by list wise </span>
								    </div>  
								 </div>
								<hr>  
								 
								 
								

								<?php 
									$m=0;
									for($i=1;$i<=$_SESSION['pck']['days'];$i++)
									{  	
								?>  
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Day - <?php echo $i;?></label>
								    <div class="col-sm-10"> 
									<textarea class="form-control" placeholder="Day <?php echo $i;?> info" name="days[]"    required="required" rows="3"><?php   echo $day_info[$m]; ?></textarea>	
								    </div>  
								</div>
								 
								<?php 
									$m++;
									} 
								?>  
								<hr> 
								<?php 
									 
									$pck_info_about  = mysql_query("select about_place,is_active  from pck_list  where id= $_REQUEST[id]  ");
									$pck_info_data = mysql_fetch_object($pck_info_about);
								?> 
								
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">About Place  </label>
								    <div class="col-sm-10"> 
									<textarea class="form-control" name="about_place"  rows="3"> <?php echo $pck_info_data->about_place;?></textarea>	
								    </div>  
								</div>  
								 <hr> 

								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
								      <select name="is_active">
									  <option value="1" <?php if($pck_info_data->is_active==1) echo 'selected=selected'; ?> >Active</option>
									  <option value="0" <?php if($pck_info_data->is_active==0) echo 'selected=selected'; ?> >Inactive</option>
									  </select>
								    </div>  
								 </div>	
								 <hr> 		
								 
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
								    <div class="col-sm-10">
								      <input  name="update" value="Update"  type="submit"  class="btn btn-warning"/>
								      <input  name="last_id" value="<?php echo $_REQUEST['id'];?>"  type="hidden" />
								    </div> 
								 </div>  
								</form>   
			  				</div>
			  			</div>  
						
					<?php  } ?>
	  				</div>   
	  				</div>  
	  			</div>   

	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  
<script src="script.js"></script>