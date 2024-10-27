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
								<h1 class="site-title">FoodShala</h1>
								<h6 class="site-description">Online Services for Customers & Restaurants</h6>	
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
			   <li class="paging-item"><a class="paging-link active">Customers</a></li>
			</div>

				
		<div class="row justify-content-center">
			<article class=" col-md-4 mb-5">
				<form action="files/cust-authenticate.php" method="post">
					<div class="card" style="border: 1px solid black">
						<div class="card-header"><h3>Login</h3></div>
						<div class="card-body">

							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email" required="" class="form-control">
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="Password" required="" class="form-control">
		                    </div>
		                </div>

		                <div class="card-footer">
		                	<button type="submit" name="cust_login" class="btn btn-success">Login</button>
		                	<span> Don't have account? <a class="text-danger" href="cust-signup.php">Signup</a></span>
		                 </div>
		             </div>
	                </form>
                </article> 
			</div>
    </div>

   <?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>

</body>
</html>