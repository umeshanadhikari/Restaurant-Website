<?php session_start(); 
        require 'files/connection.php';
         if(isset($_POST['contact'])){
            $name = $_POST['name'];
	        $email = $_POST['email'];
             $message = $_POST['message'];
             $sql="insert into contactus (name, email, message) values ('$name', '$email', '$message')";
             $result=$conn->query($sql);
           }
?>

<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body>      
	    <?php require 'navbar.php'; ?>
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house.jpg">

				<div class="header">
					<div class="row header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="site-logo" /> 
							<div class="site-text-box">
								<h1 class="site-title">Ceylon Restaurant</h1>
								<h6 class="site-description">Online Services for Customer</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="nav-ul">
								<form method="get" action="search.php">
									<input type="text" name="search" placeholder="search by name" value="<?php echo @$_GET['search']; ?>">
									<input type="submit" name="submit" value="search">
								</form>
							</ul>
						</nav>	
					</div>
				</div>
			</div>

    <div class="container-fluid">
			
			<div class="paging-links">
				<li class="paging-item"><a class="paging-link active">Contact us</a></li>
			</div>

				<div class="row justify-content-center">
					<div class="col-md-4 mb-5">
						<form action="" method="POST" class="contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group float-right">
					          <button type="submit" name="contact" class="btn btn-success">
					            Send
					          </button>
					        </div>
						</form>

					</div>

					    <div class="col-md-4 mb-5">
						    <ul>
							   <h4 class="text-info">Our Address</h4>
								<p> Near JK Station road Malabe.</p>
                                <p><span class="fa fa-mobile"></span> <a href="tel:+919876543210">+94-1234567890</a></p>
                                <p> <span class="fa fa-envelope-o"></span> <a href="mailto:fscustomers@gmail.com">Ceylon_customers@gmail.com</a></p>
                            </ul>
                        </div>

                    <div class="col-md-4 mb-5">
						<ul>
							<h4 class="text-info">Follow us</h4>
				            <p>
					          <form method="" action="">
                                <input type="email" name="follow" placeholder="your Email">
                                <input type="submit" name="follow" value="follow">
				               </form>
			                </p>
			                
                            <p><a href="https://facebook.com/ceylon_restaurant" class="social"><span class="fa fa-facebook-official"></span></a>
                            <a href="https://instagram.com/ceylon_restaurant" class="social"><span class="fa fa-instagram"></span></a>
                            <a href="https://twitter.com/ceylon_restaurant" class="social"><span class="fa fa-twitter"></span></a>
                            <a href="https://www.linkedin.com/in/ceylon_restaurant/" class="social"><span class="fa fa-linkedin"></span></a>
                            <a href="https://youtube.com/ceylon_restaurant" class="social"><span class="fa fa-youtube"></span></a></p>
			            </ul>
					</div>

				</div>

            
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->

				<div class="row justify-content-center">
					<div class="col-md-12">
						
					<iframe src="https://maps.google.com/maps?q=Malabe%20Sri%20lanka&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" style="width: 490px; height: 400px;"></iframe><style>.mapouter{position:relative;height:400px;width:490px;background:#fff;} .maprouter a{color:#fff !important;position:absolute !important;top:0 !important;z-index:0 !important;}</style><a href="https://blooketjoin.org">blooketjoin</a><style>.gmap_canvas{overflow:hidden;height:400px;width:490px}.gmap_canvas iframe{position:relative;z-index:2}</style>
						
					</div>
				</div>
		</div>

	<?php require 'footer.php'; ?>

    <script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>	
	
</body>
</html>