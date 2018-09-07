<?php 
	include_once("../view/header-footer/header.php");     
?>   
<script src="<?php echo ROOTPATH;?>/view/js/tab/jobs.js"></script>  



<form method="post" >
<input type="text" name="title" Placeholder="Enter Job Ttitle e.q. Need Marketing Person For..." />

<select name="type">
<option value="3" >Full Time</option>
<option value="2" >Part Time</option>
<option value="1" >Work From Home</option>
<option value="4" >Internships</option>
</select>


<select name="roles">
<?php 
	foreach($job_categories as $dt)
	{
?>
	<option value="<?php echo  $dt->id;?>" ><?php echo  $dt->name;?></option> 
<?php } ?> 
</select>

<input type="text" name="min_sal" Placeholder="minimum salary e.q. 2000" />
<input type="text" name="man_sal" Placeholder="maximum salary e.q. 35000" />



<select name="city" onchange="select_sub_locations(this.value)" id="city">
<?php 
	foreach($city_id as $dt)
	{
?>
	<option value="<?php echo  $dt->id;?>" <?php if($_COOKIE['search_city_id']==$dt->id) echo 'selected=selected'; ?> ><?php echo  $dt->name;?></option> 
<?php } ?> 
</select> 
 

<input placeholder="Enter City Name" class="inputText citySelect" type="text" id="main-city-load" name="main-city-load"  />     
<div id="suggesstion-main-city-load">   
	<ul class="searchCityList">
		<?php 
		foreach($city_locations as $dt)
		{
		?>
			<li onClick="selectsublocation(<?php echo  $dt->id;?>)" >
			<?php echo  $dt->location_name;?>
			<div class=mapIcon>
				<i class="fa fa-plane searchIcon" aria-hidden="true"></i>
			</div>
			</li>  
		<?php } ?>  
	</ul>
</div>
 


</form>

 

<?php include_once("../view/header-footer/footer.php");  