<?php
	session_start();
	require_once("func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="css/logincss.css">
	<link rel="stylesheet" type="text/css" href="css/bg.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>5StarHotel Login</title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<!-- Navigation -->
	<?php require 'navigation.php'; ?>
	<style>
	</style>
	<!-- Page Content -->
	<div id="pageform" class="col wrapper">
		<div class="col">
			<form action="dangnhap.php" method="POST">
				<h1>LOGIN</h1>
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button id="lg" type="submit">Login</button>
				<a href="#" onclick="document.getElementById('modal').style.display='block'" id="regis" >Đăng ký ?</a>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me.
				</label>
			</form>
		</div>
		
		<div class="w3-container">
			
			<div id="modal" class="modal">
				<!-- Modal Content -->
				<form id="formdk" class="modal-content animate" action="dangky.php" method="POST">
					<div class="w3-container ">
						<div class="col">
							<h3 style="color:black">Đăng ký</h3>
							<label style="color:black" ><b>Username</b></label>
							<input type="text" placeholder="Nhập Username" name="username" required>
							<label style="color:black" ><b>Password</b></label>
							<input type="password" placeholder="Nhập Password" name="password" required>
							<label style="color:black" ><b>Nhập lại password</b></label>
							<input type="password" placeholder="Repeat Password" name="repassword" required>
							<label style="color:black" ><b>Họ Tên</b></label>
							<input type="text" placeholder="Nhập họ tên" name="name" required>
							<label style="color:black" ><b>Số CMND/Căn cước</b></label>
							<input type="text" placeholder="Nhập CMND" name="idnum" required>
							<label style="color:black" ><b>Số điện thoại</b></label>
							<input type="text" placeholder="Nhập số điện thoại" name="phone" required>
							<br></br>
							<button type="button" onclick="document.getElementById('modal').style.display='none'" class="cancelbtn btn btn-danger">Cancel</button>
							<button id="subtn"  class="btn btn-success" type="submit">Sign Up</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="push"></div>
	</div>

	<!-- Footer -->
	<?php require 'footer.php'; ?>

	<!-- Bootstrap core JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/modal.js"></script>

</body>

</html>
