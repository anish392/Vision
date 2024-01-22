<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<html>

<head>
	<title>Online PHP Script Execution</title>
</head>

<body>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> User Registration</title>
	<!--bootstarp css link--->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-----css link--->
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<!-- <script type="text/javascript">
		function validateForm(theForm) {
			if (theForm.email.value == "") {
				alert("Please enter your valid email.");
				return (false);
			}
			alert('All datas are valid,send it to the server');

			return (true);
			
		}
	</script> -->

	<div class="container-fluid my-3">
		<h2 class="text-center">New User Registration</h2>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="lg-12 col-x1-6   d-flex align-items-center justify-content-center">
				<form method="post" enctype="multipart/form-data">
					<!-- username field -->
					<div class="form-outline mb-4">
						<label for="user_username" class="form-label">Username</label>
						<input type="text" id="user_username" class="form-control" placeholder="Enter your username" pattern="[A-Za-z0-9-_.]{3,20}" autocomplete="off" required="required" name="user_username" />
					</div>
					<!-- emailfield -->
					<div class="form-outline mb-4">
						<label for="user_email" class="form-label">Email</label>
						<input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name=" user_email" />
					</div>
					<!-- password field -->
					<div class="form-outline mb-4">
						<label for="user_password" class="form-label">Password</label>
						<input type="password" maxlength="10" minlength="5" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" />
					</div>
					<!--confirm password  -->
					<div class="form-outline mb-4">
						<label for="conf_user_password" class="form-label">Confirm Password</label>
						<input type="password" id="conf_user_password" class="form-control" placeholder=" confirm password" autocomplete="off" required="required" name="conf_user_password" />
					</div>
					<!-- address -->
					<div class="form-outline mb-4">
						<label for="user_address" class="form-label">Address</label>
						<input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address" />
					</div>
					<!-- contact -->
					<div class="form-outline mb-4">
						<label for="user_contact" class="form-label">Mobile no.</label>
						<input type="text" pattern="^[9]\d{9,9}$" id="user_contact" class="form-control" placeholder="Enter your Mobile no." autocomplete="off" required="required" name="user_contact" />
					</div>
					<!-- ========================== -->
					<div class="mt-4 pt-2">
						<input type="submit" value="Register" class="bg-warning py-2 px-3 border-0" name="user_register">
						<p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
							<a href="user_login.php" class="text-danger text-decoration-none"> Login</a>
						</p>

					</div>
				</form>
			</div>
		</div>
	</div>




</body>


</html>
<!-- php code -->
<?php
if (isset($_POST['user_register'])) {
	$user_username = $_POST['user_username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$hash_passsword = password_hash($user_password, PASSWORD_DEFAULT);
	$conf_user_password = $_POST['conf_user_password'];
	$user_ip = getIPAddress();
	$user_address = $_POST['user_address'];
	$user_contact = $_POST['user_contact'];

	//select query
	$select_query = "Select * from user_table where username='$user_username' or user_email='$user_email'";
	$result = mysqli_query($con, $select_query);
	$rows_count = mysqli_num_rows($result);
	if ($rows_count > 0) {
		echo "<script>alert('This user already exists check username or email')</script>";
	} elseif ($user_password != $conf_user_password) {
		echo "<script>alert('Passwords Donot match')</script>";
	} else {
		//insert query///
		$insert_query = "insert into user_table (username,user_email,user_password,user_ip,user_address,user_mobile)
	values('$user_username','$user_email','$hash_passsword','$user_ip','$user_address','$user_contact')";
		$result = mysqli_query($con, $insert_query);
	}

	// $result ko thau ma $sql_execute

	if ($result) {
		echo "<script> alert('User registered sucessfully')</script>";
	} else {
		die('mysqli_error'($con));
	}
	// selecting cart items
	$select_cart_items = "Select * from cart_details where ip_address='$user_ip'";
	$result_cart = mysqli_query($con, $select_cart_items);
	$rows_count = mysqli_num_rows($result_cart);
	if ($rows_count > 0) {
		$_SESSION['username'] = $user_username;
		echo "<script>alert('You have items in your cart')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	} else {
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
?>