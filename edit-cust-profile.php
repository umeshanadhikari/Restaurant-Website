<?php 
  require 'files/connection.php';
  session_start();
  if(!isset($_SESSION['custid']))
  {
  header('location:res-login.php');
  }
  else {

//Get ID from Database
if(isset($_GET['edit'])){
$sql = "SELECT * FROM customers WHERE id =" .$_GET['edit'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
}

//Update Information
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $preference = $_POST['preference'];
    $contact_number = $_POST['contact_number'];
    $password = $_POST['password'];
    //$hashpassword = md5($password);

$update = "UPDATE customers SET name='$name', preference='$preference', contact_number='$contact_number',password='$password', email='$email' WHERE id=". $_GET['edit'];

$up = mysqli_query($conn, $update);

if(!isset($sql)){
die ("Error $sql" .mysqli_connect_error());
}
else
{
 ?>
  <meta http-equiv="refresh" content="1;url=view-cust-profile.php"/>
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
    <div class="card">
      <div class="card-header">
	     <div class="preview-area text-center">
	      <img id="profileimg" src="<?php echo $row['profile_imagepath']; ?>" style="width:130px; height: 130px;  border-radius: 50%; text-align: center;" >
       </div>
      </div>

      <div class="card-body">
      <table class="table table-borderless">
   
      <tr><th>  </th> <td><input type="hidden" name="profile_image" class="upload" onchange="readURL(this);" class="form-control"></td></tr> 

      <tr><th> Name -</th> <td><input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" class="form-control"></td></tr> 

      <tr><th> Email -</th> <td><input type="text" name="email" placeholder="email" value="<?php echo $row['email']; ?>" class="form-control"></td></tr> 
      
      <tr><th> Password -</th> <td><input type="text" name="password" placeholder="password" value="<?php echo $row['password']; ?>" class="form-control"></td></tr> 

      <tr><th> Contact -</th> <td><input type="text" name="contact_number" placeholder="contact_number" value="<?php echo $row['contact_number']; ?>" class="form-control"></td></tr> 

      <tr><th> Preference -</th> <td><input list="browsers" name="preference" id="browser" value="<?php echo $row['preference']; ?>" placeholder="preference" class="form-control">
          <datalist id="browsers">
            <option value="veg"></option>
            <option value="non-veg"></option>
          </datalist>
      </td></tr> 

</table>
</div>

    <div class="card-footer text-right"><button type="submit" name="update" id="btn-update" onClick="update()" class="btn btn-primary"><strong>Update</strong></button>
    <a href="view-cust-profile.php">
    <button type="button" value="button" class="btn btn-danger">Cancel</button></a>
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