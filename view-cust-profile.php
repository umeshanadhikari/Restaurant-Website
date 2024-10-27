<?php
session_start();
include 'files/connection.php';
$id = $_SESSION['custid'];
$sql="select * from customers where id=$id";
$result = $conn->query($sql);
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
          <li class="paging-item"><a class="paging-link active">Your Profile</a></li>
      </div>

     <div class="row justify-content-center">
     <div class="col-lg-4 col-md-6 col-sm-8">
       
       <?php while($row = $result->fetch_assoc()){ ?>

        <div class="card" style="border: 1px solid black">
         <div class="card-header text-center"><img src="<?php echo $row['profile_imagepath']; ?>" class="card-img-top " alt="profile-image" style="width:130px; height: 130px;  border-radius: 50%; text-align: center;"></div>
          <div class="card-body">
        <table class="table table-borderless">
            <tr><th> Name -</th> <td><?php echo $row['name']; ?></td></tr> 
            <tr><th> Email -</th> <td><?php echo $row['email']; ?></td></tr> 
            <tr><th> Password -</th> <td><?php echo $row['password']; ?></td></tr> 
            <tr><th> Contact -</th> <td><?php echo $row['contact_number']; ?></td></tr> 
            <tr><th> Preference -</th> <td><?php echo $row['preference']; ?></td></tr> 
            </table>
          </div>
          <div class="card-footer text-right"><a href="edit-cust-profile.php?edit=<?php echo $row['id']; ?>" class="btn btn-lg btn-info"> Edit </a> </div>
      </div>
     <?php } ?>
</div>
</div>

 </div>

    <?php require 'footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>


</body>
</html>