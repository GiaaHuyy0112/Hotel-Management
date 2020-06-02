<?php
	session_start();
	require_once("func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/bg.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>5StarHotel Booking</title>

  <!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <!-- Navigation -->
  <?php require 'navigation.php'; ?>
	<style>
	h1{
		color: white;
	}
	form{
		background:	#696969;
		padding: 15px;
	}
	#formbook{
		margin: auto;
		width: 60%;
	}
	</style>
  <!-- Page Content -->
  <?php
	if (isset($_SESSION["username"]) && isset($_SESSION["name"]) ) {
		$user = $_SESSION["username"];
		$name = $_SESSION["name"];
		$info = "SELECT * FROM user WHERE (username = '$user' AND name = '$name' )";
		require_once("../doan/conn.php");
		$result = $conn->query($info);
		$row = $result->fetch_assoc();
		$idnum = $row['idnum'];
		$phone = $row["phone"];
		
	}
  ?>
	<div id="formbook" class="w3-container wrapper " >
		<h1>Đặt phòng</h1>
		<form action="datphong.php" method="POST">
			<div class="form-group">
				<label for="name">Họ và Tên</label>
				<input type="text" class="form-control" name="name" placeholder="Họ và tên" value="<?php if (isset($_SESSION["username"])){echo $name;}?>" >
			</div>
			<div class="form-group">
				<label for="idnum">Số CMND/ Căn cước</label>
				<input type="text" class="form-control" name="idnum" placeholder="Số CMND/Căn Cước" value="<?php if (isset($_SESSION["username"])){echo $idnum;}?>">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại</label>
				<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="<?php if (isset($_SESSION["username"])){echo $phone;}?>">
			</div>
			<div class="form-group">
				<label>Loại phòng</label><br>
				<select name="category">
						<option value="1">Phòng Đơn</option>
						<option value="2">Phòng Đôi</option>
						<option value="3">Phòng Gia Đình</option>
					</select>
			</div>
			<div id="cal" class="row" >
			<div class="col" >
				<label>Ngày đến</label>
					<div class="form-group">
						<input type="date" name="adate" max="3000-12-31" 
								min="2019-01-01" class="form-control">
					</div>
				</div>
				<div class="col" >
				<label>Ngày đi</label>
					<div class="form-group">
						<input type="date" name="edate" min="2019-01-01"
								max="3000-12-31" class="form-control">
					</div>
				</div>
			</div>
			<label>Dịch vụ:</label>
			<input type="checkbox" name="service" value="1">Phục vụ bữa sáng<br>
			<button type="submit">Đặt phòng</button>
		</form>
		<div class="push"></div>
	</div>
  <!-- Footer -->
  <?php require 'footer.php'; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
