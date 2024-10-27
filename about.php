<?php session_start(); ?>
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
								<h6 class="site-description">Online Services for Customers</h6>	
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
					<ul>
						<li class="paging-item"><a class="paging-link active" class="text-center">About us</a></li>
					</ul>
			    </div>


				<div class="row">

					<article class="col-lg-4 mb-5">
					<img style="width: auto;height: 300px;" src="img/owner.jpg" alt="image" class="img-fluid rounded responsive" />
					</article>

					<article class="col-lg-4 mb-5">
						    <div class="about">
								<h4 class="name">Umeshan</h4>
								<p class="title">Web Developer</p>
								<p class="about">I'm the owner of the ceylon restaurant hotel chain.</p>
                            </div>
                            <div class="social-link">
								<p><a href="https://facebook.com/umeshan" class="social"><span class="fa fa-facebook-official"></span></a>
                                <a href="https://instagram.com/umeshan" class="social"><span class="fa fa-instagram"></span></a>
                                <a href="https://twitter.com/umeshan" class="social"><span class="fa fa-twitter"></span></a>
                                <a href="https://www.linkedin.com/in/asifkhn143/" class="social"><span class="fa fa-linkedin"></span></a>
                                <a href="https://youtube.com/" class="social"><span class="fa fa-youtube"></span></a></p>
                            </div>
					</article>

				</div>

                <div class="row">
                	<article class="col-lg-4"></article>
                	<article class="col-lg-4 mb-5 text-left">
						        <img style="width: 220px;height: 250px;" src="img/logo.png" alt="image" class="img-fluid rounded responsive"/>
					        </article>

					       <article class="col-lg-4 mb-5">
								<h4 class="name">About Ceylon Restaurant</h4>
								<p class="title">This website is created by Asif Ahmad. This is a online food ordering website.!!!</p>
								<p class="about">In this Website customer can create their account with thier dtails and then they will be available to do the order from the menu items.!!! <a href="contact.php">contact us</a><br>
							    <a class="float-right"><h3 class="text-yellow"> Thank you</h3></a></p>
							</article>	        	

			   </div>

    </div> 
           
           <?php require 'footer.php'; ?>

           <script src="js/jquery.min.js"></script>
	       <script src="js/parallax.min.js"></script>


</body>

</html>