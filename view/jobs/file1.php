<?php 
	include_once("../view/header-footer/header.php");     
?>   
<script src="<?php echo ROOTPATH;?>/view/js/tab/jobs.js"></script>  

<script>
var last; 
$(document).ready(function(){   

	for(i=0;i<=<?php echo $affected_rows_job_category;?>;i++)
		$("#job-sub-category-span"+i).hide();   
	
	
	
	$(".month-salary").click(function()
	{   
		 
		$.ajax({	
		type: "POST",
		url: URL+"/all-ajax/job.php", 
		data: {month_salary:1,val:$(this).val()},
		beforeSend: function(){ 
		},
		success: function(data)
		{  
			$("#MyIframeDivs").load("../basic-search.php?keyword1=<?php echo $_REQUEST['keyword1'];?>&keyword2=<?php echo $_REQUEST['keyword2'];?>");  
		}
		});
	});
	 
});   

function search_by_category(val,name,id)
{ 	
	$("#job-sub-category-span"+val).show();	
	$("#job-sub-category-span"+last).hide();	
	last = val;    
	window.location.href = URL+"/jobs/<?php echo $_REQUEST["keyword1"];?>/"+name+"-"+id+"";
	$("#MyIframeDivs").load("../basic-search.php?keyword1=<?php echo $_REQUEST['keyword1'];?>&keyword2=<?php echo $_REQUEST['keyword2'];?>"); 
	
}   

function search_by_type(val)
{ 	 
	$.ajax({	
	type: "POST",
	url: URL+"/all-ajax/job.php", 
	data: {search_by_type:1,val:val,remove:$('#job-type'+val).is(':checked')},
	beforeSend: function(){ 
	},
	success: function(data)
	{  
		$("#MyIframeDivs").load("../basic-search.php?keyword1=<?php echo $_REQUEST['keyword1'];?>&keyword2=<?php echo $_REQUEST['keyword2'];?>"); 
	
	}
	});
	
}   
</script>

<br>
<br>
<br>
<br>
<br>

<?php 
	$test_array = explode(",",$_SESSION['search_by_type_val']); 
	array_pop($test_array);     
?> 
<div style="border:1px solid;width:300px;align:center;" >
 <input type="checkbox" name="job-type" id="job-type3" onclick="search_by_type(3)" <?php if(in_array(3,$test_array)) echo 'checked=checked'; ?> /><h5>Full Time</h5>      
 <input type="checkbox" name="job-type" id="job-type2" onclick="search_by_type(2)" <?php if(in_array(2,$test_array)) echo 'checked=checked'; ?>  /><h5>Part Time</h5>      
 <input type="checkbox" name="job-type" id="job-type1" onclick="search_by_type(1)" <?php if(in_array(1,$test_array)) echo 'checked=checked'; ?>  /><h5>Work From Home</h5>      
 <input type="checkbox" name="job-type" id="job-type4" onclick="search_by_type(4)"<?php if(in_array(4,$test_array)) echo 'checked=checked'; ?>   /><h5>Internship</h5>       
</div>     


<br>
<br>
<br>
 
<div style="border:1px solid;width:300px;align:center" >
 <input type="radio" name="month-salary" class="month-salary" value="5000" <?php if($_SESSION['month_salary_val']==5000) echo 'checked=checked'; ?> /><h5>5000 & above </h5>      
 <input type="radio" name="month-salary" class="month-salary"  value="6000" <?php if($_SESSION['month_salary_val']==6000) echo 'checked=checked'; ?> /><h5>6000 & above </h5>      
 <input type="radio" name="month-salary" class="month-salary"  value="7000" <?php if($_SESSION['month_salary_val']==7000) echo 'checked=checked'; ?> /><h5>7000 & above </h5>      
 <input type="radio" name="month-salary" class="month-salary"  value="8000" <?php if($_SESSION['month_salary_val']==8000) echo 'checked=checked'; ?> /><h5>8000 & above </h5>       
 <input type="radio" name="month-salary" class="month-salary"  value="9000" <?php if($_SESSION['month_salary_val']==9000) echo 'checked=checked'; ?> /><h5>9000 & above </h5>       
 <input type="radio" name="month-salary" class="month-salary"  value="10000" <?php if($_SESSION['month_salary_val']==10000) echo 'checked=checked'; ?> /><h5>10000 & above </h5>       
</div> 


<?php   
	foreach($job_categories as $key=>$dt)
	{   
	$stmt =  $conn->prepare("select  name, id  from sub_job_categories   where category_id=:category_id  ");         
	$stmt->bindValue(':category_id', $dt->id, PDO::PARAM_INT); 
	$stmt->execute();   
	$sub_job_categories = $stmt->fetchAll(PDO::FETCH_OBJ);
	
?>

 
<div style="border:1px solid;width:300px;align:center;float:left" >
 <input type="radio" name="job-category" id="job-category" onclick="search_by_category(<?php echo $key;?>,'<?php echo $dt->name;?>',<?php echo $dt->id;?>)" /><h5><?php echo $dt->name;?></h5> 
 
	<span id="job-sub-category-span<?php echo $key;?>">
	<?php   
		foreach($sub_job_categories as  $dt)
		{ 
	?> 
		<?php echo $dt->name;?><input type="checkbox" name="job-sub-category" id="job-sub-category"   />
		<br>
	
	<?php 
		} 
	?> 
	</span>
 
</div>    
<?php } ?>

 



<br>
<br>
<br>
<br>
<br>


<div id="MyIframeDivs"> <?php include_once 'basic-search.php';	?> </div>    


<?php include_once("../view/header-footer/footer.php");  