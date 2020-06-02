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
			width: 120%;
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
				<th>Loại phòng</th>
				<th>Dịch vụ</th>
				<th>Ngày nhận phòng</th>
				<th>Ngày thanh toán</th>
				<th>Tổng tiền</th>
				<th>Tên nhân viên</th>
				<th>Tùy chọn</th>
            </thead>
			<tbody>
	<?php 
		//if (isset($_POST["category"]) ) {
				//$category = $_POST["category"];
				$sql = "SELECT * FROM bill WHERE 1";
				require_once("../conn.php");
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					$namecus = $row['namecus'];
					$idnum = $row['idnum'];
					$phone = $row['phone'];
					$adate= $row['adate']; //ngay den
					$edate = $row['edate'];//ngay di
					$room = $row['room'];//room number
					$category = $row['category'];
					$nameservice = $row['nameservice'];
					$price = $row['price'];
					$date = $row['date'];
					$nameem = $row['nameem'];
					
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $namecus; ?></td>
					<td><?php echo $idnum; ?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $room; ?></td>
					<td><?php echo $category; ?></td>
					<td><?php echo $nameservice; ?></td>
					<td><?php echo $adate; ?></td>
					<td><?php echo $date; ?></td>
					<td><?php echo $price; ?></td>
					<td><?php echo $nameem; ?></td>
					<td><a href="delbill.php?idnum=<?php echo $idnum ?>" >Xóa</a></td>
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
