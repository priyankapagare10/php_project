<!DOCTYPE html>
<html>
  <head>
    <title>Simla Foods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="<?php echo ROOTPATH;?>/admin/css/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="<?php echo ROOTPATH;?>/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo ROOTPATH;?>/admin/css/styles.css" rel="stylesheet">
	
	<script src="<?php echo ROOTPATH;?>/admin/js/jquery-1.11.1.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo ROOTPATH;?>/admin/js/jquery-ui.js"></script>
    <script src="<?php echo ROOTPATH;?>/admin/js/jquery.validate.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<!--<link rel="shortcut icon" type="image/png" href="<?php //echo ROOTPATH;?>/view/images/fevicon.png?v=2"/>-->
	
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Simla Foods</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <!--<div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div> -->
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">	                          
	                          <li><a href="<?php echo ROOTPATH;?>/admin/logout.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">

			<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu
                    <li class="current"><a href="<?php echo ROOTPATH;?>/admin/"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li> -->
                    <!--<li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
					<li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                          
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li> -->
					
					
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i>  User<span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo ROOTPATH;?>/admin/users/registered_users.php">Products</a></li> 
                        </ul>
                    </li>	
					
				
					
				<!--	<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-plane"></i> Flight <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/flight/book-tickets.php">Confirmed Tickets</a></li> 
                        </ul>
                    </li>
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-cutlery"></i> Hotels <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/main-hotel/book-tickets.php">Confirmed Booking</a></li> 
                        </ul>
                    </li>
					
						<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-header"></i> Property & Custom Hotel <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/c-cities">Custom Cities</a></li> 
                            <li><a href="<?php //echo ROOTPATH;?>/admin/hotel">Hotel</a></li> 
                        </ul>
                    </li>  -->
					
					
					 <!--<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-bold"></i> Bus <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                       <!--   <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/bus/book-tickets.php">Confirmed Tickets</a></li> 
                        </ul>
                    </li>-->
					
					 <!--<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-phone"></i> Recharge <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/recharge/paid_orders.php">Recharge Orders</a></li> 
                        </ul>
                    </li>-->
					
					 <!--<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-remove"></i> Failed Services <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/users/failed-tickets.php">Failed Tickets  </a></li> 
                        </ul>
                    </li>
		
					
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-refresh"></i> Refund <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!--  <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/refund/">Refund Details</a></li> 
                        </ul>
                    </li>

					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-flag"></i> Pilgrimage <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!-- <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/piligrim/">Pilgrimage</a></li> 
                        </ul>
                    </li>	
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-lock"></i> My Packages  <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                      <!--   <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/packages/category.php">Packages Category</a></li> 
                            <li><a href="<?php //echo ROOTPATH;?>/admin/packages/">Packages List</a></li> 
                            <li><a href="<?php //echo ROOTPATH;?>/admin/adding-excel/add-new.php" style="color:green;">Upload New Excel</a></li> 
                            <li><a href="<?php //echo ROOTPATH;?>/admin/packages/" style="color:red;">Update Existing Excel</a></li>  
                        </ul>
                    </li>	
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-question-sign"></i> Enquiry <span class="caret pull-right"></span>
                         </a>-->
                         <!-- Sub menu -->
                        <!-- <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/enquiry/package.php"> Packages Enquiry</a></li> 
                            <li><a href="<?php //echo ROOTPATH;?>/admin/enquiry/hotel.php">Hotel Enquiry</a></li> 
                        </ul>
                    </li>	-->
					 
					
					
					<!--<li><a href="<?php //echo ROOTPATH;?>/admin/cim/"><i class="glyphicon glyphicon-list"></i> Crime In Maharashtra</a></li>
					<li><a href="<?php //echo ROOTPATH;?>/admin/photo_gallery/"><i class="glyphicon glyphicon-picture"></i>Photo Gallery</a></li>
					<li><a href="<?php //echo ROOTPATH;?>/admin/news_event/"><i class="glyphicon glyphicon-globe"></i>News & Event</a></li>
					
					<li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Publications
                            <span class="caret pull-right"></span>
                         </a>
                         
                         <ul>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/publications/mcr">Monthly Crime Record</a></li>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/publications/wcr">Weekly Crime Record</a></li>
                            <!--<li><a href="<?php //echo ROOTPATH;?>/admin/publications/missing_persons">Missing Persons</a></li>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/publications/wanted">Wanted Persons</a></li>
                            <li><a href="<?php //echo ROOTPATH;?>/admin/publications/udb">Unknown Dead Bodies</a></li> 
                        </ul>
                    </li>
					
					<li><a href="<?php echo ROOTPATH;?>/admin/aipdm/"><i class="glyphicon glyphicon-inbox"></i>AIPDM</a></li>
					<li><a href="<?php echo ROOTPATH;?>/admin/mspdm/"><i class="glyphicon glyphicon-link"></i>MSPDM</a></li>
					<li><a href="<?php echo ROOTPATH;?>/admin/ivest_charge/"><i class="glyphicon glyphicon-phone"></i>Investigation & Chargsheet </a></li>-->
                </ul>
	 </div>
	 
 </div>	 