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
					<div class="panel-title"><h3> Paid Orders </h3></div>
					
					<!--<div align="right">  <input type="button"    class="btn btn-warning" name="btnback" id="btnback" value=" Add New City " onClick="javascript:location.href='add_new.php';" />
					</div> -->
					
				</div>
				
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Transaction  Id</th>  	
								<th>Amount</th> 
								<th>Number</th> 
								<th>Type</th> 
								<th>Status</th>  
								<th>Detail</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								  $result = mysql_query("select * from recharge  where user_type=0	");
								  $sr=1; 
								  while($row = mysql_fetch_object($result))
								  { 
										if($row->cust_id!='')
										{
											$rst = mysql_query("select email from users where cust_id='$row->cust_id' ");	
											$user_name =mysql_fetch_row($rst);
											$email_id = $user_name[0];
										} else {
											$rst = mysql_query("select email from txn_details where txnid='$row->payee_txn_id' ");	
											$user_name =mysql_fetch_row($rst);
											$email_id = $user_name[0];
										} 	 
										
										if($row->type==1)
										{										 
											$Type = "Prepaid Mobile";
										} 

										else if($row->type==2)
										{										 
										$Type = "DTH";
										} 

										else if($row->type==3)
										{										 
										$Type = "Datacard";
										} 

										else if($row->type==4)
										{										 
										$Type = "Post Paid";
										} 

										else if($row->type==5)
										{
										$Type = "STV";
										} 

										else if($row->type==6)
										{
										$Type = "Landline";
										} 

										else if($row->type==7)
										{										 
										$Type = "Electricity";
										} 

										else if($row->type==8)
										{										 
										$Type = "Gas";
										} 

										else if($row->type==9)
										{										 
										$Type = "Life Insurance";
										} 	
										
										if($row->status==0)
											$sts = "Fail";
										else if($row->status==1)
											$sts = "Success";
										else if($row->status==2)
											$sts = "Pending";
							?>
							<tr class="odd gradeX">
								<td><?php echo $sr++;?> </td>
								<td><?php echo $row->t_id;?> </td>
								<td><?php echo $row->amount;?> <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /> </td>
								<td><?php echo $row->mobile;?> </td>
								<td><?php echo $Type;?> </td>
								<td><?php echo $sts;?> </td> 
								<td><a href="details.php?id=<?php echo $row->id;?>&payee_txn_id=<?php echo $row->payee_txn_id;?>&txn_id=<?php echo $row->t_id;?>">   <img src="<?php echo ADMINPATH;?>/images/view_details.png"  title="View Details"/>  </a> </td> 
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