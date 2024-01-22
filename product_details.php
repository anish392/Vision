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
          <a class="nav-link" href="#">Contact</a>
        </li> -->
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                cart_item();
                                                                                                ?></sup></a>
            </li>
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
        // login logut
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
    </nav>
    <!--third child---->
    <div class="bg-light">
      <h3 class="text-center">Vision Store</h3>
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
          view_details();
          get_unique_brands();
          get_unique_categories();

          //     $select_query="Select * from products order by rand() 0,8";
          //     $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['product_title'];
          //     while($row=mysqli_fetch_assoc($result_query)){
          //    $product_id=$row['product_id'];
          //    $product_title=$row['product_title'];
          //    $product_description=$row['product_description'];
          //    $product_image1=$row['product_image1'];
          //    $product_price=$row['product_price'];
          //    $category_id=$row['category_id'];
          //    $brand_id=$row['brand_id'];
          //    echo"<div class'col-md-4'>
          //         <div class='card'>
          //   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          //   <div class='card-body'>
          //     <h5 class='card-title'>$product_title</h5>
          //     <p class='card-text'>$product_description</p>
          //     <a href='#' class='btn btn-danger'>Add to cart</a>
          //     <a href='#' class='btn btn-secondary'>View more</a>
          //   </div>
          // </div>
          //   </div>";
          //     }

          ?>
          <!-- <div class="col-md-4">
        <div class="card">
  <img src="img/b1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Black glass</h5>
    <p class="card-text">---------------------</p>
    <a href="#" class="btn btn-danger">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
  </div> -->
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
          //      $select_brands="select * from brands";
          //      $result_brands=mysqli_query($con,$select_brands);
          //$row_data=mysqli_fetch_assoc($result_brands);
          // echo $row_data['brand_title'];//
          // while($row_data=mysqli_fetch_assoc($result_brands)){
          //   $brand_title=$row_data['brand_title'];
          //   $brand_id=$row_data['brand_id'];
          //   echo "<li class='nav-item'>
          //   <a href='index.php?brand=$brand_id' class='nav-link text-light'><h4>$brand_title</h4></a>

          //  </li>   ";
          // }


          ?>





          <!-- <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Ray-Ban</h4></a>
      
     </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Police</h4></a>
      
     </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Oakley</h4></a>
      
     </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Persol</h4></a>
      
     </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Other Brands</h4></a>
      
     </li>   
     
    </ul> -->
          <!--categories to be displayed-->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info ">
              <a href="#" class="nav-link text-light text-center px-5">
                <h4>Categories</h4>
              </a>
            </li>
            <?php
            getcategories();
            //      $select_categories="select * from categories";
            //      $result_categories=mysqli_query($con,$select_categories);
            //$row_data=mysqli_fetch_assoc($result_categories);
            // echo $row_data['category_title'];//
            // while($row_data=mysqli_fetch_assoc($result_categories)){
            //   $category_title=$row_data['category_title'];
            //   $category_id=$row_data['category_id'];
            //   echo "<li class='nav-item'>
            //   <a href='index.php?category=$category_id' class='nav-link text-light'><h4>$category_title</h4></a>
            //   </li>";
            // }
            ?>
          </ul>

          <!-- </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Man sunglasses</h4></a>
      
     </li>   
     <li class="nav-item">
      <a href="#" class="nav-link text-light"><h4>Female sunglasses</h4></a>
     -->

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