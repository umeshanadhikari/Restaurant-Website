
<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="openNav()">
  <span class="navbar-toggler-icon"></span>
  </button>

<!-- Sidebar -->

 <div id="mySidebar" class="sidebar">
   <a href="javascript:void(0)" class="closebtn text-right" onclick="closeNav()">×</a>

  <?php if (isset($_SESSION['restid'])) { ?>
    <a class="text-left">
    <img src="<?php echo $_SESSION['image']; ?>"style="width:80px; height: 80px;  border-radius: 100%;"></a>
    <a id="name"><?php echo 'Welcome, '.' '.$_SESSION['name']; ?></a><hr>
    <a href="index.php">Menu Item</a><hr>
    <a href="add-menu-item.php">Add Item</a><hr>
    <a href="view-orders.php">Orders</a><hr>
    <a href="about.php">About us</a><hr>
    <a href="contact.php">Contact us</a><hr>
    <a href="view-res-profile.php">See Profile</a><hr>
    <a class="pull-right">
        <form method="get" action="files/logout.php">
          <input name="logout" type="submit" value="Logout" class="btn btn-danger">
        </form>
    </a>


  <?php } elseif (isset($_SESSION['custid'])) { ?>
    <a class="text-left">
    <img src="<?php echo $_SESSION['image']; ?>"style="width:80px; height: 80px;  border-radius: 100%;"></a>
    <a id="name"><?php echo 'Welcome, '.' '.$_SESSION['name']; ?></a><hr> 
    <a href="index.php">Menu Item</a> <hr>
    <a href="view-cart.php">Cart</a> <hr>
    <a href="my-orders.php">Orders</a><hr>
    <a href="about.php">About us</a><hr>
    <a href="contact.php">Contact us</a><hr>
    <a href="view-cust-profile.php">See Profile</a><hr>
    <a class="pull-right">
        <form method="get" action="files/logout.php">
          <input name="logout" type="submit" value="Logout" class="btn btn-danger">
        </form>
    </a>


  <?php }  else { ?>

  <br><br><br>

  <a href="javascript:void(0)" class="dropdown-btn">Customers</a>
 <div class="dropdown-container"><hr>
    <a href="cust-login.php">Login</a><br>
    <a href="cust-signup.php">Signup</a>
  </div><hr>

  <!-- <a href="javascript:void(0)" class="dropdown-btn">Restaurants</a>
  <div class="dropdown-container"><hr>
    <a href="res-login.php">Login</a><br>
    <a href="res-signup.php">Signup</a>
  </div><hr> -->

  <a href="about.php">About us</a><hr>

  <a href="contact.php">Contact us</a><hr>


<?php } ?>

</div>

<!-- End of Sidebar -->


<!-- Navbar -->

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
        
<?php if (isset($_SESSION['restid'])) { ?>

  <ul class="navbar-nav">
<hr>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Menu Item</a>
    </li>
<hr>
    <li class="nav-item">
      <a class="nav-link" href="add-menu-item.php">Add Item</a>
    </li>
<hr>
    <li class="nav-item">
      <a class="nav-link" href="view-orders.php">Orders</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
<hr>

    <li class="nav-item">
        <a class="nav-link" href="view-res-profile.php" id="name">
          <img src="<?php echo $_SESSION['image']; ?>" style="width: 30px; height: 30px;  border-radius: 100%;"><?php echo ' '. $_SESSION['name']; ?> </a>
    </li>

    <li class="nav-item">
      <form method="get" action="files/logout.php">
         <a class="nav-link"><input name="logout" type="submit" value="Logout" class="btn btn-danger"></a>
      </form>
    </li>

  </ul>


<?php } elseif (isset($_SESSION['custid'])) { ?>

  <ul class="navbar-nav">
<hr>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Menu Item</a>
    </li>
<hr>
    <li class="nav-item">
      <a class="nav-link" href="view-cart.php">Cart</a>
    </li>
<hr>
    <li class="nav-item">
      <a class="nav-link" href="my-orders.php">Orders</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
<hr>

    <li class="nav-item">
        <a class="nav-link" href="view-cust-profile.php" id="name">
          <img src="<?php echo $_SESSION['image']; ?>" class="card-img-top " alt="profile-image" style="width:30px; height: 30px;  border-radius: 100%;"> 
          <?php echo ' '. $_SESSION['name']; ?> </a>
    </li>

    <li class="nav-item">
      <form method="get" action="files/logout.php">
        <a class="nav-link"><input name="logout" type="submit" value="Logout" class="btn btn-danger"></a>
      </form>
    </li>

  </ul>


<?php }  else { ?>

  <ul class="navbar-nav">
<hr>
   <li class="nav-item">
      <a class="nav-link" href="index.php">Menu Item</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
<hr>
    <li class="nav-item">
      <div class="dropdown">
        <a class="nav-link" class="dropdown-btn">Customers</a>
        <div class="dropdown-content">
          <a href="cust-login.php">Login</a><br>
          <a href="cust-signup.php">Signup</a>
        </div>
      </div>
    </li>

<!-- <hr>
    <li class="nav-item">
      <div class="dropdown">
        <a class="nav-link" class="dropdown-btn"> Restaurants</a>
        <div class="dropdown-content">
          <a href="res-login.php">Login</a><br>
          <a href="res-signup.php">Signup</a>
        </div>
      </div>
    </li>
  </ul> -->

<?php } ?>

  </div>
</nav>

<!-- End of Navbar -->


<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>



<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0px";
  document.getElementById("main").style.marginLeft= "0px";
}
</script>




<style>
#name{
  
  color: skyblue;
  
}
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: whitesmoke;
  overflow: hidden;
  transition: 0.1s;
  padding-top: 10px;
}

.sidebar a {
  padding: 0px 20px 0px 40px;
  text-decoration: none;
  font-size: 16px;
  color: #818181;
  display: block;
  transition: 0.1s;
}

.sidebar a:hover {
  color: black;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 0;
  margin-right: 0px;
  font-size: 35px;
}


#main {
  transition: margin-left .3s;
  padding: 5px;
}


@media screen and (max-height: 450px) {
  .sidebar {padding-top: 18px;}
  .sidebar a {font-size: 20px;}
}

.dropdown-container {
  display: none;
  background-color: whitesmoke;
  padding-left: 40px;
}

</style>