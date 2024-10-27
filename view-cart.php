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
						<li class="paging-item"><a class="paging-link active">My Cart</a></li>
					</ul>
				</nav>
			</div>

	
<div class="container">
	    	
	    <?php 
	    	$cust_id = $_SESSION['custid'];
	    	$sql = "select cust_cart.*, restaurants.res_name from cust_cart, restaurants where cust_id = '$cust_id' && cust_cart.res_id=restaurants.id";
	    	$result = mysqli_query($conn, $sql);
	    ?>

	 <table class="table table-striped table-bordered responsive">
	    <tr>
	    	<th>Item Name</th>
	    	<th>Res. Name</th>
	    	<th>Item Quantity</th>
	    	<th>Item Price</th>
	      	<th>Total Price</th>
	        <th>Action</th>
	    </tr>
	        
            <?php $sum = 0; $sum1 = 0; $sum2 = 'Res Names= '; $sum3 = 'All items= ';
            while($row = mysqli_fetch_array($result)) { ?>

  
        <tr>	
			<td><h3><?php echo ($row['item_name']); ?></h3></td>
			<td><h4><?php echo ($row['res_name']); ?></h4></td>
			<td><?php echo $row['item_quantity']; ?></td> 
			<td><?php echo 'Rs '.$row['item_price']; ?></td>
			<td><?php echo 'Rs '.$row['total_price']; ?></td>
			<td><a class="btn btn-danger" href="files/delete.php?id=<?php echo $row['id'];?>">Remove</a></td>
		</tr>

	    	<?php 
	    		$sum3 .= $row['item_name'].' '.$row['item_quantity'].', ';
	    		$sum2 .= $row['res_name'].', ';
	    		$sum1 = $sum1+$row['item_quantity'];
	    		$sum = $sum+$row['total_price'];
	    		$res_id = $row['res_id'];
	    	} 
	    	 if($sum > 0){ ?>

	        <tr>
	     	    <td><?php echo $sum3; ?></td>
	     	    <td><?php echo $sum2; ?></td>
	     	    <td><?php echo $sum1; ?></td>
	     	    <td></td>
	            <td><b>Rs <?php echo $sum; ?></b></td>
	            <td></td>
	        </tr>
        <tr>
	        <td colspan="4">
           	Add more items to order!!
               <a class="btn btn-primary pull-right" href="index.php">Add</a>
           </td>

           <td colspan="4">

	        <form action="place-order.php" method="post">
	    		<input type="hidden" name="item_names" value="<?php echo $sum3; ?>">
	    		<input type="hidden" name="res_names" value="<?php echo $sum2; ?>">
	    		<input type="hidden" name="cart_price" value="<?php echo $sum; ?>">
	    		<input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
	    		
	    		please, checkout to book your order!!<button class="btn btn-success pull-right">CHECKOUT</button>
	    	</form>
	       </td>
	   </tr>

	     <?php }else{ ?>

           <br> <p class="text-center">No items added in the cart!!</p>

           <?php } ?>
    </table>
   
	  
	</div>	

	<?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>   	    

</body>
</html>
<?php } ?>