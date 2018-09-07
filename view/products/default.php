<?php 
	include_once("../view/header-footer/header.php");      
?> 

 
   <div class="greyBox">
    <div class="contain">
	
		  
<?php

    $stmt=$conn->prepare("select * from product");
	$count = 0;
    $stmt->execute(); 
	$results = $stmt->fetchAll(PDO::FETCH_OBJ);  
	$ct = 0;
    foreach ($results as $row)
	//$res=$stmt->get_result();
	 //while($row=$stmt->fetch($results))
	// while ($row = $res->fetch_assoc())	
    {    
		$ct++;
	?>	     
    <div class="<?php if($ct == 3) echo 'techBoxesLast'; else echo'techBoxes';?>">
    <h3 class="dataHead">Lorem Ipsum</h3>
    <h4 class="subHead">Dolore ipsum commete...</h4>
    <div class="techImg">
    <div class="imgBox"><img src="<?php echo ROOTPATH;?>/uploads/<?php echo $row->name;?>" alt="img" class="img-responsive"></div>
    </div>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of ...
   <!-- <p class="readMore"><a href="#">Read More... </a></p>-->
    </div> 
	
	<?php if($ct == 3) { ?>
		<div class="clear"></div> 
	<?php  $ct=0;} ?>  
	<?php  
		
		} 
	?> 
    </div>
</div>

 

<?php include_once("../view/header-footer/footer.php");  