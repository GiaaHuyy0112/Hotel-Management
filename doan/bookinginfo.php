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
				<div class="col" >
				<label>Nhập CMND/Căn cước</label>
					<input type="text" placeholder="Nhập CMND/Căn cước" name="idnum" required>
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
		</div>
	</form>
	<table id="roomtable" class="table">
            <thead>
                <th>Tên</th>
				<th>CMND/Căn cước</th>
				<th>Số điện thoại</th>
                <th>Phòng</th>
				<th>Dịch vụ</th>
				<th>Tùy chọn</th>
            </thead>
			<tbody>
	<?php 
		if (isset($_POST["idnum"])) {
			$idnum = $_POST["idnum"];
				$sql = "SELECT * FROM customer WHERE (idnum = '$idnum')";
				require_once("../doan/conn.php");
				
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['idnum']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['room']; ?></td>
					<td><?php if($row['idservice'] == "2"){
							echo ("Không");
								}
							else{
								echo ("Phục vụ bữa sáng");
							}
					?></td>
					<td><?php if (isset($_SESSION['username'])){
							
							 ?> <a href="delete.php?idnum=<?php echo $row['idnum']; ?>">Hủy đặt</a> <?php
								}
					?></td>
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
