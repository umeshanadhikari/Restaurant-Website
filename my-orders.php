<?php 
	require 'files/connection.php';
	session_start();
	if(!isset($_SESSION['custid']))
	{
	header('location:res-login.php');
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
						<li class="paging-item"><a class="paging-link active">My Orders</a></li>
					</ul>
				</nav>
			</div>


        <div class="container">
	    <?php 
	    	require 'files/connection.php';
	    	$user_id = $_SESSION['custid'];
	    	$sql = "select orders.*, restaurants.res_name from orders, restaurants where  orders.res_id=restaurants.id";
	    	
	    	$result = mysqli_query($conn, $sql);
	    ?>

	     
	    			<table class="table table-striped table-bordered responsive">
	    			<tr><td colspan="8" class="text-center"><h4>Past Orders</h4></td></tr>
	    				<tr>
	    					<th>Item Names</th>
	    					<th>Res. name</th>
	    					<th>Address</th>
	    					<th>Total Price</th>
	    					<th>Mobile</th>
	    					<th>Date</th>
	    					<th>Status</th>
	    					<th>Action</th>
	    				</tr>

	    	<?php while($row = mysqli_fetch_array($result)) { ?>

	    				<tr>
	    					<td><?php echo ($row['item_names']); ?></td>
	    					<td><?php echo ($row['res_names']); ?></td>
	    					<td><?php echo ($row['address']); ?></td>
	    					<td><?php echo $row['total_price']; ?></td>
	    					<td><?php echo $row['mobile_number']; ?></td>
	    					<td><?php echo $row['date']; ?></td>
	    					<td><?php echo $row['status']; ?></td>
	    					<td>
	    					    <?php 
						        if($row['status'] == 'cancelled by Customer'){ ?>
						        <?php }
						        else{ ?>
						        <a class="btn btn-danger remove-item" href="files/cancel-order.php?id=<?php echo $row['id'];?>">Cancel Order</a>
						         <?php } ?>
						    </td>
	    				</tr>
	    				<?php } ?>
	    			</table>
            		    
      </div>		


	<?php require 'footer.php'; ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>   	    

</body>
</html>
<?php } ?>