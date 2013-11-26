
<!DOCTYPE html>
<html>
<head>
	<title>Order Sales</title>
	<link rel="stylesheet" href="assets/css/bootplus-responsive.min.css"/>
	<link rel="stylesheet" href="assets/css/bootplus.min.css"/>
	<link rel="stylesheet" href="assets/css/font-awesome.css"/>

	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .hero-unit {
          padding: 60px;
      }
      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
      </style>
</head>
<body>
	  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand " href="#"><i class="icon-tags"></i> Order Sales</a>
          <div class="nav-collapse collapse">
           
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>



    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li  class="active "><a href="#" class="customer-sidebar"><i class="icon-group"></i> Customers</a></li>
              <li><a href="#" class="order-sidebar"><i class="icon-shopping-cart"></i> Orders</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9 mainbody" style="background:white;" >
          

        
        </div><!--/span-->
      </div><!--/row-->

    


    </div><!--/.fluid-container-->



	<script src="assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".mainbody").load("customerbody.php");
			$(".customer-sidebar").stop(true,true).click(function(){
				$(".mainbody").load("customerbody.php");
				$(this).parent().addClass("active");
				$(".order-sidebar").parent().removeClass("active");
			});
			$(".order-sidebar").stop(true,true).click(function(){
				$(".mainbody").load("orderbody.php");
				$(this).parent().addClass("active");
				$(".customer-sidebar").parent().removeClass("active");
			});
			
			

		});
	</script>
</body>
</html>