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

  <title>5StarHotel Homepage</title>

  <!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

  <!-- Navigation -->
  <?php require 'navigation.php'; ?>
	<style>
	h1{
		margin: auto;
	}
	th{
		color: white;
	}
	div.col{
		margin: auto;
	}
	#table {
		margin: auto;
		width: 70%;
	}
	</style>
  <!-- Page Content -->
  <div class="wrapper" >
	<!-- Search form -->
	<div id="logo" class="row">
		<h1 style="color:white;">5StarHotel</h1>
	</div>
	<div id="table" class="col">
	<form action="#" method="POST">
		<div id="infobar" class="row">
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
				<div class="col" >
				<label>Loại phòng:</label>
					<select name="category">
						<option value="1">Phòng Đơn</option>
						<option value="2">Phòng Đôi</option>
						<option value="3">Phòng Gia Đình</option>
					</select>
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
		</div>
	</form>
	<table id="roomtable" class="table">
            <thead>
                <th>Room</th>
				<th>Lầu</th>
                <th>Giá/Ngày</th>
            </thead>
			<tbody>
	<?php 
		if (isset($_POST["adate"]) && isset($_POST["category"]) ) {
				$adate = $_POST["adate"];
				$idcat = $_POST["category"];
				$isready = 'ready';
				$find = "SELECT * FROM room WHERE (idcat = '$idcat') AND (isready = '$isready' || edate < '$adate')";
				require_once("../doan/conn.php");
				
				$result = $conn->query($find);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$check = "SELECT * FROM category WHERE (idcat = '$idcat')";
						$rcheck = $conn->query($check);
						$r = $rcheck->fetch_assoc();
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $row['room']; ?></td>
					<td><?php echo $row['idfloor']; ?></td>
					<td><?php echo $r['price']; ?></td>
				</tr>
            	
	<?php			
					}
				
				}
		}
	?>
				</tbody>
			</table>
			</div>
		</div>
		<div class="push"></div>
	</div>
    <!-- /.row -->
	
  <!-- /.container -->

  <!-- Footer -->
  <?php require 'footer.php'; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
  <script>
        $(document).ready(function() {
            $('#roomtable').DataTable();
        } );
		table = $('#roomtable').DataTable( {
				retrieve: true,
				searching: false,
				lengthChange: false,
				sorting: false,
				paging: false,
				info: false,
				scrollY: "400px",
				scrollCollapse: true
				
			});
    </script>
</body>

</html>
