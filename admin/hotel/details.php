<?php 	include_once('../../config.php');  
 
		include_once(ABS_PATH.'/admin/login_check.php');   
  include ABS_PATH.'/admin/header.php';	?>  
  

<link href="<?php echo ROOTPATH;?>/view/css/custom-hotels/thumbnail-slider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOTPATH;?>/view/css/custom-hotels/ninja-slider.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ROOTPATH;?>/view/css/custom-hotels/thumbnail-slider.js" type="text/javascript"></script>
<script src="<?php echo ROOTPATH;?>/view/css/custom-hotels/ninja-slider.js" type="text/javascript"></script>

 
		 
		 <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
							<div class="panel-heading"> 
							
							<?php   
								$result = mysql_query("select h1.hotel_name,h1.check_in,h1.check_out,h2.city,h2.star_rating,h2.user_id,h2.budget from hotel_detail  as h1 inner join hotel1 as h2 on h1.id = h2.hotel_id  where h1.id =$_REQUEST[id]  ");  
								$details = mysql_fetch_object($result);  
								$email_r = mysql_query("select email from users where id=$details->user_id"); 
								$email = mysql_fetch_object($email_r);       
								     
							?>
							
								<div class="panel-title"> <h3>Hotel Details </h3>   </div>   
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>  
								
							</div>  
								
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<hr>  
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Hotel name</label>
								    <div class="col-sm-10">
								      <h5><?php echo $details->hotel_name;?></h5>
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Check In Time</label>
								    <div class="col-sm-10">
								       <h5><?php echo $details->check_in;?></h5>
								    </div> 
								 </div>	 
								  <hr>  
							<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Check Out Time</label>
								    <div class="col-sm-10">
								       <h5><?php echo $details->check_out;?></h5>
								    </div> 
								 </div>	 
								 <hr>  
								 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">City</label>
								    <div class="col-sm-10">
								      <h5><?php echo $details->city;?></h5>
								    </div> 
								 </div>	 	
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Star Rating </label>
								    <div class="col-sm-10">
								     <h5><?php echo $details->star_rating;?> Star</h5>
								    </div> 
								 </div>	 
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Budget</label>
								    <div class="col-sm-10">
								      <h5><?php echo $details->budget;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" />	</h5>  
								    </div> 
								 </div>	 
							    <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Email id</label>
								    <div class="col-sm-10">
								      <h5><?php echo $email->email;?></h5>
								    </div> 
								</div>	   
								</form>  
							
			  				</div>
							
							
<div id='ninja-slider'>
		<?php 
			  $image_result = mysql_query("select image from  hotel_images where hotel_id = $_REQUEST[id]");      
			  $hotel1_R = mysql_query("select a.cust_id from hotel1 as b  inner join users as a  on  a.id  = b.user_id  where  b.hotel_id = $_REQUEST[id]"); $user = mysql_fetch_row($hotel1_R);     
		 ?> 
        <div>
            <div class="slider-inner">
                <ul>
					<?php  
					while($img = mysql_fetch_object($image_result))
					{
 
					?>
					<li><a class="ns-img" href="<?php echo ROOTPATH;?>/uploads/hotel_image/<?php echo $user[0].'/'.$img->image; ?>"></a></li>  
					<?php }?>
                </ul>
                 
            </div>
			<?php 
				$image_result = mysql_query("select image from  hotel_images where hotel_id = $_REQUEST[id]");      
			?> 
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <?php  
							while($img = mysql_fetch_object($image_result))
							{
							?>
							<li> 
							<a class="thumb" href="<?php echo ROOTPATH;?>/uploads/hotel_image/<?php echo $user[0].'/'.$img->image; ?>"></a>
							<span>MI</span> 
							</li> 
						  <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
</div>

			  			</div>
	  				</div>
	  				 
	  			</div>

	  			 


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  