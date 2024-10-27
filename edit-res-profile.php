<?php 
  require 'files/connection.php';
  session_start();
  if(!isset($_SESSION['restid']))
  {
  header('location:res-login.php');
  }
  else {

//Get ID from Database
if(isset($_GET['edit'])){
$sql = "SELECT * FROM restaurants WHERE id =" .$_GET['edit'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
}

//Update Information
if(isset($_POST['update'])){
    $res_name = $_POST['res_name'];
    $res_email = $_POST['res_email'];
    $res_number = $_POST['res_number'];
    $res_city = $_POST['res_city'];
    $res_password = $_POST['res_password'];
    //$hashpassword = md5($res_password);

$update = "UPDATE restaurants SET res_name='$res_name', res_number='$res_number', res_password='$res_password', res_email='$res_email' WHERE id=". $_GET['edit'];

$up = mysqli_query($conn, $update);

if(!isset($sql)){
die ("Error $sql" .mysqli_connect_error());
}
else
{ ?>
  <meta http-equiv="refresh" content="1;url=view-res-profile.php"/>
<?php
}
}
}
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
          <li class="paging-item"><a class="paging-link active">Edit Profile</a></li>
      </div>
  
     <div class="row justify-content-center">
     <div class="col-lg-4 col-md-6 col-sm-8">

<form method="post">
<div class="card" style="border: 1px solid black;">
<div class="card-header">
	<div class="preview-area text-center">
	<img id="profileimg" src="<?php echo $row['profile_imagepath']; ?>" / style="width:130px;height: 130px;border-radius: 50%;">
    </div>
</div>
<div class="card-body">
<table class="table table-borderless">
   
      <tr><th></th> <td><input type="hidden" name="profile_image" class="upload" onchange="readURL(this);" class="form-control"></td></tr> 

      <tr><th>Name -</th> <td><input type="text" name="res_name" placeholder="Name" value="<?php echo $row['res_name']; ?>" class="form-control"> </td></tr> 

      <tr><th>Email -</th> <td><input type="text" name="res_email" placeholder="email" value="<?php echo $row['res_email']; ?>" class="form-control"></td></tr> 
      
      <tr><th>Password -</th> <td><input type="text" name="res_password" placeholder="password" value="<?php echo $row['res_password']; ?>" class="form-control"></td></tr> 

      <tr><th>Res. Number -</th> <td><input type="text" name="res_number" placeholder="contact_number" value="<?php echo $row['res_number']; ?>" class="form-control"></td></tr> 

      <tr><th>Res. City -</th> <td><input type="text" name="res_city" value="<?php echo $row['res_city']; ?>" placeholder="Res. city" class="form-control">
      </td></tr> 

</table>
</div>

     <div class="card-footer text-right"><button type="submit" name="update" id="btn-update" onClick="update()" class="btn btn-primary"><strong>Update</strong></button>
    <a href="view-res-profile.php"><button type="button" value="button" class="btn btn-danger">Cancel</button></a>
    </div>

</div>
</form>

</div>
</div>


      
 </div>

    <?php require"footer.php"; ?>

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