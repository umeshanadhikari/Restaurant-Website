<?php 
    session_start();
    require 'files/connection.php';
    if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select menu_items.*, restaurants.res_name FROM menu_items, restaurants WHERE menu_items.res_id=restaurants.id && item_name LIKE '%$searchKey%'";
    }else
    $sql = "SELECT * FROM menu_items";
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
                                <form method="get" action="">
                                    <input type="text" name="search" placeholder="search by name" value="<?php echo @$_GET['search']; ?>">
                                    <input type="submit" name="submit" value="search">
                                </form>
                            </ul>
                        </nav>  
                    </div>
                </div>
            </div>
        
            
            <div class="paging-links">
                <li class="paging-item"><a class="paging-link active">Search Items</a></li>
            </div>

     <div class="container-fluid">

            <div class="row justify-content-center">

                <?php while( $row = $result->fetch_object() ){ ?>
                
                    <article class="col-lg-3 col-md-6 col-sm-8 mb-5" style="">

                        <div class="card card-body">

                            <img style="width: auto; height: 180px;" src="<?php echo $row->item_imagepath ?>" alt="image" class="card-img-top rounded">

                                <h4 class="item_name"><?php echo $row->item_name ?>
                                <i class="item_type pull-right"><?php echo $row->item_type ?></i></h4>
                                <p class="item_desc pull-left"><?php echo $row->item_desc ?> </p>
                                <p class="res_name pull-left"><?php echo 'Res Name- '.$row->res_name ?> </p>
                                
                            <form action="files/add-cart.php" method="post">
                                <input type="hidden" name="item_id" value="<?php echo $row->item_id ?>">
                                <input type="hidden" name="res_id" value="<?php echo $row->res_id ?>">
                                <input type="hidden" name="item_name" value="<?php echo $row->item_name ?>">
                                <input type="hidden" name="item_price" value="<?php echo $row->item_price ?>">
                                <p class="item_quantity pull-left"><input type="number" name="item_quantity" value="1" required / max="50" min="1"></p>
                                <p class="item_price text-right"><?php echo 'Rs '.$row->item_price ?></p>

                                <?php if (isset($_SESSION['restid'])) { ?>
                                <a href="javascript:void(0);" class="btn btn-block btn-primary orderbtn btn-sm">Add</a>
                        
                                <?php } elseif (isset($_SESSION['custid'])) { ?>
                                <button name="addCartBtn" class="btn btn-block btn-primary btn-sm">Add</button>
                        
                                <?php }  else { ?>
                                <a href="cust-login.php" class="btn btn-block btn-primary orderBtn btn-sm">Add</a>
                                <?php } ?>

                            </form>

                        </div>

                    </article>
                 <?php  } ?>
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