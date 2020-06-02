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
			width: 80%;
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
                <th>Tên khách hàng</th>
				<th>CMND/Căn cước</th>
                <th>Số điện thoại</th>
				<th>Phòng</th>
				<th>Giá phòng</th>
				<th>Ngày đến</th>
				<th>Ngày đi</th>
				<th>Checkin</th>
				<th>Tùy chọn</th>
            </thead>
			<tbody>
	<?php 
		//if (isset($_POST["category"]) ) {
				//$category = $_POST["category"];
				$sql = "SELECT * FROM customer WHERE 1";
				require_once("../conn.php");
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					$adate= $row['adate']; //ngay den
					$edate = $row['edate'];//ngay di
					$room = $row['room'];//room number
					
					$sqlr = "SELECT * FROM room WHERE room = '$room'"; //Get idcat from room
					$rroom = $conn->query($sqlr);	//Processing
					$rowroom = $rroom->fetch_assoc();//Processing
					
					$idcat = $rowroom['idcat'];	//idcat
					
					$sqlprice = "SELECT * FROM category WHERE idcat = '$idcat'"; //Get price form category
					$rprice = $conn->query($sqlprice);	//Processing
					$rowprice = $rprice->fetch_assoc();//Processing
					
					$price = $rowprice['price']; //price
					if($row['checkin'] == 0)
					{
						$checkin = "Chưa";
					}
					else{
						$checkin = "Rồi";
					}
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['idnum']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['room']; ?></td>
					<td><?php echo $price; ?></td>
					<td><?php echo $row['adate']; ?></td>
					<td><?php echo $row['edate']; ?></td>
					<td><?php echo $checkin; ?></td>
					<td><a href="checkin.php?idnum=<?php echo $row['idnum'] ?>" >Checkin</a>
					|<a href="payment.php?idnum=<?php echo $row['idnum'] ?>" >Thanh toán</a>
					|<a href="delete.php?idnum=<?php echo $row['idnum'] ?>" >Hủy</a></td>
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
