<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        img {
            display: block;
            margin: auto;
            width: 50%
        }

        .containers {
            text-align: center;

            width: 300px;
            height: 200px;
            padding-top: 100px;
        }

        #btn {
            font-size: 25px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-----css link--->
    <link rel="stylesheet" href="style.css">

    <title> Vision_Payment</title>
</head>

<body>
    <!-- php code to access user-id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from user_table where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center my-5">
            <!-- <div class="col-md-6"><a href="https://www.paypal.com" target="_blank"><img src="../img/paypal.png" alt=""></a></div> -->
            <div class="col-md-6"><a href="order.php?user_id=<?php echo "$user_id" ?>">
                    <div class="containers">
                        <button class="bg-warning px-2 text-dark justify-content-center py-2 bordered-0 ">
                            <h2 class="text-center text-decoration-none">Submit Order</h2>
                        </button>
                    </div>
                </a></div>



        </div>
    </div>
</body>

</html>