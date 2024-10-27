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
			
			<article class="col-lg-4 col-md-6 col-sm-8">
				<form action="files/cust-save.php" method="post" enctype="multipart/form-data">
					<div class="card">
					<div class="card-header"><h3>Signup</h3></div>
					<div class="card-body">

						<div class="form-group pull-left">
							<label>Name<b>*</b></label>
							<input type="text" name="name" placeholder="Name" required="" class="form-control">
						</div>

						<div class="form-group pull-right">
							<label>Contact<b>*</b></label>
							<input type="text" class="form-control" placeholder="contact number" name="contact_number" required="">
						</div>

						<div class="form-group pull-left">
							<label>Email<b>*</b></label>
							<input type="email" name="email" placeholder="Email" required="" class="form-control">
						</div>

						<div class="form-group pull-right">
							<label>Password<b>*</b></label>
							<input type="password" name="password" placeholder="Password" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>Profile Image<b>*</b></label><br>
							<input type="file" type="text" name="profile_image" class="upload" onchange="readURL(this);" required="" class="form-control"><br>
							<span class="text-danger">JPG, GIF or PNG. Max size of 800K</span>
							<div class="preview-area">
								<img id="profileimg" src="" / style="width: 130px;height: 130px;border-radius: 50%">
							</div>
						</div>


						<div class="form-group">
							<label>Your Preference<b>*</b>&nbsp;</label><br>
							<input type="radio" name="preference" value="non-veg" required=""> Non-Veg &nbsp;
							<input type="radio" name="preference" value="veg" required=""> Veg
						</div>

					</div>

					<div class="card-footer">
						<button type="submit" name="cust_signup" class="btn btn-success">Sign up</button>
						<span>Already have an account? <a class="text-danger" href="cust-login.php">Login</a></span>
					</div>
				    </div>
				</form>
            </article> 
		</div>
			
 </div>

	<?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
    <script type="text/javascript">
		$('.upload').on('click', function(){
			$('.preview-area').css({
				'display': 'block'
			});
		});

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileimg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

</body>
</html>
