<?php 
    session_start();
	require 'files/connection.php';
	if(!isset($_SESSION['restid']))
	{
	header('location:cust-login.php');
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
				<li class="paging-item"><a class="paging-link active">Your Orders</a></li>
			</div>


	    <?php require 'files/connection.php';
	    	$restid = $_SESSION['restid'];
	    	$sql = "select orders.*, customers.name from orders, customers where  orders.cust_id=customers.id";
	    	$result = mysqli_query($conn, $sql);
	    ?>
	        
	        			<table class="table table-striped table-bordered responsive">
	    				<tr>
	    					<th>Item Names</th>
	    					<th>Res Names</th>
	    					<th>Cust. Name</th>
	    					<th>Mobile</th>
	    					<th>Address</th>
	    					<th>Date</th>
	    					<th>Total price</th>
	    					<th>Status</th>					
	    				</tr>
            <?php while($row = mysqli_fetch_array($result)) { ?>
	    				<tr>
	    					<td><?php echo $row['item_names']; ?></td>
	    					<td><?php echo $row['res_names']; ?></td>
	    					<td><?php echo $row['name']; ?></td>
	    					<td><?php echo $row['mobile_number']; ?></td>
	    					<td><?php echo $row['address'].' Rs'; ?></td>
	    					<td><?php echo $row['date']; ?></td>
	    					<td><?php echo $row['total_price'].' Rs'; ?></td>
	    					<td><?php echo $row['status']; ?></td>
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