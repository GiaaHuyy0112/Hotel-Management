<?php
		session_start();
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == "user"){
		echo "<script>
					alert('Bạn không có quyền truy cập !');
					window.location.href='../index.php';
					</script>";
		}
	}
	else{
		echo "<script>
					alert('Bạn không có quyền truy cập !');
					window.location.href='../index.php';
					</script>";
	}
	require_once("../func.php");
	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Add product example</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">
	<!-- Navigation -->
  <?php require 'navigation.php'; ?>
	<style>
		#form{
			width: 50%;
		}
		html, body {
			height: 100%;
			margin: 0;
		}
		.wrapper {
			min-height: 100%;
			margin-bottom: 50px;
		}
		.footer,.push {
			height: 50px;
		}
	</style>
  
    <div id="form" class="container wrapper">
      <div class="py-5 text-center">
        <h1>5StarHotel</h1>
		<h2>Thêm phòng</h2>
      </div>
      <div class="row">
        <div class="col-md order-md-1">
          <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="room">Room's Number</label>
              <div class="input-group">
                <input type="text" class="form-control" id="room" name="room" required>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="category">Loại</label>
              <div class="input-group">
                <select class="input-group" name="category">
					<option value="1">Phòng Đơn</option>
					<option value="2">Phòng Đôi</option>
					<option value="3">Phòng Gia Đình</option>
				</select>
              </div>
            </div>

			
			<div class="mb-3">
              <label for="floor">Lầu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="floor" name="floor" required>
              </div>
            </div>
			<div class="mb-3">
              <label for="isready">Tình trạng</label>
              <div class="input-group">
                <input type="text" class="form-control" id="isready" name="isready" required>
              </div>
            </div>
			<div class="mb-3" >
				<label>Ngày hết hạn</label>
				<div class="form-group">
					<input type="date" name="edate" max="3000-12-31" 
							min="2019-01-01" class="form-control">
				</div>
			</div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Thêm</button>
			<?php
				addroom();
			?>
          </form>
        </div>
      </div>
	  <div class="push"></div>
    </div>

	<!-- Footer -->
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	
  </body>
</html>