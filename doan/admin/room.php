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
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
		#form{
			width: 70%;
		}
		.button {
			font: bold 11px Arial;
			text-decoration: none;
			background-color: #EEEEEE;
			color: #333333;
			padding: 2px 6px 2px 6px;
			border-top: 1px solid #CCCCCC;
			border-right: 1px solid #333333;
			border-bottom: 1px solid #333333;
			border-left: 1px solid #CCCCCC;
		}
	</style>
  <!-- Page Content -->
  <div id="form" class="container wrapper" >
	<!-- Search form -->
	<div id="logo" class="row">
		<h1>5StarHotel</h1>
	</div>
	<table id="roomtable" class="table">
            <thead>
				<th>Phòng</th>
				<th>Loại</th>
				<th>Lầu</th>
				<th>Giá</th>
				<th>Tình trạng</th>
				<th>Ngày sẵn sàng</th>
				<th>Tùy chọn</th>
            </thead>
			<tbody>
	<?php 
		//if (isset($_POST["category"]) ) {
				//$category = $_POST["category"];
				$room = "SELECT * FROM room WHERE 1";
				require_once("../conn.php");
				$result = $conn->query($room);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$idcat = $row['idcat'];
						$idfloor = $row['idfloor'];
						$cat = "SELECT * FROM category WHERE (idcat = '$idcat' )";
						$fl = "SELECT * FROM floor WHERE (idfloor = '$idfloor' )";
						$rcat = $conn->query($cat);
						$rfl = $conn->query($fl);
						$rowcat = $rcat->fetch_assoc();
						$rowfl = $rfl->fetch_assoc();
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $row['room']; ?></td>
					<td><?php if($idcat == $rowcat['idcat']){
								echo $rowcat['namecat'];
								}; ?></td>
					<td><?php echo $rowfl['floor']; ?></td>
					<td><?php echo $rowcat['price']; ?></td>
					<td><?php if($row['isready'] == "ready"){
								echo "Sẵn sàng";
								}
								else{
									echo "Không sẵn sàng";
								}
								?></td>
					<td><?php echo $row['edate']; ?></td>
					<td><a class="button" href="option.php?id=<?php echo $row['idroom'];?>&type=ready">Sẵn sàng</a>|
					<a class="button" href="option.php?id=<?php echo $row['idroom'];?>&type=busy">Bận</a>
					|<a class="button" href="option.php?id=<?php echo $row['idroom'];?>&type=del">Xóa</a></td>
				</tr>
            	
	<?php			
					}
				
				}
		//}
	?>
				</tbody>
			</table>
		</div>
		<div class="push"></div>
	</div>
    <!-- /.row -->
	
  <!-- /.container -->

  <!-- Footer -->

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
				searching: true,
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
