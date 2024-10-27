<?php 
	require 'files/connection.php';
	session_start();
	if(!isset($_SESSION['restid']))
	{
	header('location:res-login.php');
	}
	else {
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
				<li class="paging-item"><a class="paging-link active">Add Item</a></li>
			</div>


	    	<div class="row justify-content-center">
	        <div class="col-lg-4 col-md-6 col-sm-8">
	           <form action="files/add-item.php" method="post" enctype="multipart/form-data">
	        	<div class="card" style="border: 1px solid black">
		        <div class="card-header"><h3>Add Item</h3></div>
		        <div class="card-body">
	        	<div class="form-group">
				    <label for="item_name">Item Name<b>*</b></label>
				    <input type="text" class="form-control" id="item_name" name="item_name" required/>
				</div>

				<div class="form-group">
					<label for="item_name">Item Image<b>*</b></label>
					<input type="file" name="item_image" class="uploader" onchange="readURL(this);" required />
					<span class="text-muted" style="font-size: 14px;">JPG, GIF or PNG. Max size of 800K</span>
					<div class="preview-area">
						<img id="profileImg" src="" / style="width: 130px;height: 130px;">
					</div>
				</div>
				
				<div class="form-group">
				    <label for="item_desc">Item Description<b>*</b></label>
				    <input type="text" class="form-control" id="item_desc" name="item_desc" required/>
				</div>
				<div class="form-group">
				    <label for="item_type">Item Type<b>*</b>&nbsp;</label><br>
				    <input type="radio" name="item_type" value="non-veg" required> Non-Veg &nbsp;
		  			<input type="radio" name="item_type" value="veg" required> Veg
				</div>
				<div class="form-group">
				    <label for="item_price">Item Price<b>*</b></label>
				    <input type="text" class="form-control" id="item_price" name="item_price" required/>
				</div>
				<div class="form-group">
				    <button type="submit" name="addItemBtn" class="btn btn-success">Add Item</button>
				</div>

			</div>
		    </div>
			</form>
		</div>
	    </div>

	</div>

    <?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	
	<script type="text/javascript">
		$('.uploader').on('click', function(){
			$('.preview-area').css({
				'display': 'block'
			});
		});

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

</body>
</html>
<?php } ?>