<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body> 
	    <?php require'navbar.php' ?>

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
				<li class="paging-item"><a class="paging-link active">Restaurants</a></li>
			</div>

					
	    <div class="row justify-content-center">
		   <article class="col-lg-4 col-md-6 col-sm-8">
	            <form action="files/res-save.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header"><h3>Signup</h3></div>
                            <div class="card-body">

                                <div class="form-group pull-left">
	                                <label>Restaurant Name<b>*</b></label>
	                                 <input type="text" class="form-control" name="res_name" required />
		                        </div>


		                        <div class="form-group pull-right">
	                               <label>Restaurant Contact<b>*</b></label>
	                                <input type="text" class="form-control" name="res_number" required />
	                            </div>

	                            <div class="form-group pull-left">
		                         <label>Restaurant Email<b>*</b></label>
		                          <input type="email" class="form-control" name="res_email" required/>
		                        </div>

		                        <div class="form-group pull-right">
		                         <label>Password<b>*</b></label>
		                         <input type="password" class="form-control" name="res_password" required/>
		                        </div>

	                            <div class="form-group">
	                            	<label>Restaurant Image<b>*</b></label>
	                            	<input type="file" name="profile_image" class="upload" onchange="readURL(this);" required / class="form-control"><br>
	                            	<span class="text-muted">JPG, GIF or PNG. Max size of 800K</span>
	                            	<div class="preview-area">
	                            	 	<img id="profileimg" src="" / style="width: 130px;height: 130px;border-radius: 50%">
	                            	</div>
		                        </div>

		                        <div class="form-group">
		                         <label>Restaurant City<b>*</b></label>
		                         <input type="text" class="form-control" name="res_city" required />
		                        </div>

		                    </div>

                        <div class="card-footer">
		                     <button type="submit" name="res_signup" class="btn btn-success">Signup</button>
		                         <span>Already have an account? <a class="text-danger" href="res-login.php">login</a></span>
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