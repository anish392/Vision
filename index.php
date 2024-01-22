<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vision</title>
  <!--bootstarp css link--->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-----css link--->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!---navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">
        <img src="img/logo.png" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else {
              echo " <li class='nav-item'>
              <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
            ?>

            <!-- <li class="nav-item">
          <a class="nav-link" href="">Contact</a>
        </li> -->
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                cart_item();  ?> </sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total price:<?php
                                                        total_cart_price();
                                                        ?> /- only</a>
            </li>



          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!--   <button class="btn btn-outline-light" type="submit">Search</button> -->
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!--second child--->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">

        <?php
        if (!isset($_SESSION['username'])) {
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'> Welcome Guest</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href=''>Welcome   " .  $_SESSION['username'] . "</a>
        </li>";
        }



        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logut.php'>Logout</a>
        </li>";
        }
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
    </nav>
    <!--third child---->
    <div class="bg-light">
      <h3 class="text-center ">Vision Store</h3>
      <p class="text-center">Good quality sunglasses at cheap rate</p>

      </h3>
    </div>
    <!--fourth child--->
    <div class="row px-1">
      <div class="col-md-10">
        <!--product-->
        <div class="row">
          <!-- fetching product -->
          <?php
          //***calling function***
          //  $ip = getIPAddress();  
          //  echo 'User Real IP Address - '.$ip;
          getproducts();
          get_unique_brands();
          get_unique_categories();




          ?>

          <!-- row end  -->
        </div>
        <!-- column end -->
      </div>

      <div class="col-md-2 bg-success p-0">
        <!--sidenav-->
        <!---brands to be displayed--->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light ">
              <h4>Brands</h4>
            </a>

          </li>
          <?php
          getbrands();



          ?>







          <!--categories to be displayed-->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info ">
              <a href="#" class="nav-link text-light text-center px-5">
                <h4>Categories</h4>
              </a>
            </li>
            <?php
            getcategories();

            ?>
          </ul>



      </div>
    </div>

    <!-- brand image -->

    <div class="brandi">
      <div class="smallcontainer">
        <div class="row">
          <div class="col-6">
            <img src="img/r.png">

          </div>
          <div class="col-6">
            <img src="img/p.png">

          </div>
          <div class="col-6">
            <img src="img/o.png">

          </div>
          <div class="col-6">
            <img src="img/per.png">

          </div>
        </div>
      </div>
    </div>








    <!--bootstarp js link--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </div>
</body>

</html>