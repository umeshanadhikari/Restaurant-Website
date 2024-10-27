<?php 
    session_start();
	require 'files/connection.php';
	if(!isset($_SESSION['custid']))
	{
	header('location:cust-login.php');
	}
	else {
?>

<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body> 

			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house.jpg">

				<?php require 'navbar.php'; ?>

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
			
			<div class="paging-links">
				<nav>
					<ul>
						<li class="paging-item"><a class="paging-link active">Your Details</a></li>
					</ul>
				</nav>
			</div>


	<div class="container">
	
	  	    <div class="row">
	    	<div class="col-md-4"></div>
	        <div class="col-md-4">

	        <form action="files/order-save.php" method="post">
	        	
	        	<div class="card" style="border: 1px solid black;">
		        
		        <div class="card-header"><h3 class="text-mute">Your Details</h3></div>
		        <div class="card-body">
		        
	        	<input type="hidden" name="total_price" value="<?php echo $_POST['cart_price']; ?>">
	        	<input type="hidden" name="res_id" value="<?php echo $_POST['res_id']; ?>">
	        	<input type="hidden" name="res_names" value="<?php echo $_POST['res_names']; ?>">
	        	<input type="hidden" name="item_names" value="<?php echo $_POST['item_names']; ?>">

					<label for="payment">Payement Type<b>*</b></label>
                      <select id="payment" class="form-control" name="payment_type">
                        <option value="Cash On Delivery">Cash On Delivery</option>
                      </select>

				    <label>Address<b>*</b></label>
				    <input type="text" class="form-control" name="address" required/>

				    <label for="item_price">Mobile Number<b>*</b></label>
				    <input type="text" class="form-control" name="mobile_number" required/>

              </div>

            
				<div class="card-footer text-right">
				    <button name="order" class="btn btn-success">SUBMIT</button>
				</div>
			</form>
		</div>
	</div>
   </div>
</div>
    
    <?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script type="text/javascript">
		$('.orderbtn').on('click', function(){
			alert('You ordered successfully.!!');
		});
	</script>   	    

</body>
</html>
<?php } ?>