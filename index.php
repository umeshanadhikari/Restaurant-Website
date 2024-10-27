<?php 
    session_start();
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
                <h1 class="site-title">Ceylon Cafe</h1>
                <h6 class="site-description">Best restaunt in Sri Lanka</h6> 
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
				<li class="paging-item"><a class="paging-link active">Menu Items</a></li>
			</div>

			
	    <?php 
	    	require 'files/connection.php';
	    	$sql = "select menu_items.*, restaurants.res_name from menu_items, restaurants where menu_items.res_id=restaurants.id";
	    	$result = mysqli_query($conn, $sql);
	    ?>

			<div class="row justify-content-center">

				<?php while($row = mysqli_fetch_array($result)) { ?>
					<article class="col-lg-3 col-md-6 col-sm-8 mb-5" style="">

						<div class="card card-body">

							<img style="width: auto; height: 180px" src="<?php echo $row['item_imagepath']; ?>" alt="Image" class="card-img-top">
								
								<h4 class="item_name"><?php echo ($row['item_name']); ?>
								<i class="item_type pull-right"><?php echo ($row['item_type']); ?></i></h4>
								<p class="item_desc pull-left"><?php echo ($row['item_desc']); ?></p>
								<p class="res_name pull-left"><?php echo 'Res Name- '.($row['res_name']) ?></p>

								<?php $item_id= $row['item_id'];?>

                            <form  action="files/add-cart.php" method="POST">
						        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
						        <input type="hidden" name="res_id" value="<?php echo $row['res_id']; ?>">
						        <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
						        <input type="hidden" name="item_price" value="<?php echo $row['item_price']; ?>">

						        <p class="item_price pull-right"><?php echo 'Rs '.$row['item_price']; ?></p>
						        <p class="item_quantity text-left"><input type="number" name="item_quantity" value="1" required max="50" min="1"></p>
						        
                                <?php if (isset($_SESSION['restid'])) { ?>
                                <a href="javascript:void(0);" class="btn  btn-primary orderbtn btn-sm btn-block">Add</a>
						
                                <?php } elseif (isset($_SESSION['custid'])) { ?>
							    <button name="addcart" type="submit" class="btn btn-block btn-primary btn-sm">Add</button>
						
                                <?php }  else { ?>
							    <button href="cust-login.php" class="btn btn-block btn-primary orderBtn btn-sm">Add</button>
                                <?php } ?>
                            </form>
                        </div>

					</article>

				<?php } ?>
			</div>

			<div class="row justify-content-center">
                    <article class="col-lg-4 col-md-6 col-sm-8 mb-5">
						<img style="width: 250px; height: 250px" src="img/logo.png" alt="Image" class="rounded responsive"/>
					</article>
					 <article class="col-lg-4 col-sm-8 col-md-6">
					<h4 class="name">Welcome to Ceylon Restaurant</h4>
					<p>We provide better and quality food for the customers. This is online platform where customers can register here and can order from any restaurants and many items in one time from Menu Items.!!! 
					<a rel="nofollow" href="contact.php">Contact us</a> for furthur query regarding our website.!!<br><br>
                    <a href="about.php" class="btn btn-secondary">Read More</a>
					<a class="pull-right"><br> Thank you.!</a></p>
					</article>
					
			</div>
	</div>

	<?php require 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>

	<script type="text/javascript">
		$('.orderBtn').on('click', function(){
			alert('To order something, first login please!!!');
		});
	
		$('.orderbtn').on('click', function(){
			alert('Restaurants user cannot order items from menu!!!');
		});
	</script>

</body>
</html>