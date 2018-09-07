

<footer>
 


<div id="footGrey">
    <div class="contain">
    <p class="powerd">Powered By : <a href="http://www.shimlafoods.com/">Shimla Foods.</a></p>
    <p class="copy"><a href="#">Privacy Policy</a> | 
    <a href="#">Terms & Conditions </a> |  
    � Copyright 2018 <em> simlafoods.com.</em> All rights reserved.</p>
    <div class="clear"></div>
    </div>
</div>
</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo ROOTPATH;?>/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
    //Handles menu drop down
		$('.dropdown-menu').find('form').click(function (e) {
			e.stopPropagation();
		});
    });
    </script>
</body>
</html>
