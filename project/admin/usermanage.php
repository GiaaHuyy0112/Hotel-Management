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
                <th>Username</th>
				<th>Họ tên</th>
				<th>CMND/Căn cước</th>
                <th>Số điện thoại</th>
				<th>Quyền truy cập</th>
				<th>Cấp quyền</th>
            </thead>
			<tbody>
	<?php 
		if (($_SESSION["role"]) == "root" ) {
				//$category = $_POST["category"];
				$sql = "SELECT * FROM user WHERE ( idtype != 2)";
				require_once("../conn.php");
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {

					$idtype = $row['idtype'];//room number
					
					$sqlr = "SELECT * FROM typeuser WHERE idtype = '$idtype'"; //Get type from typeuser
					$rroom = $conn->query($sqlr);	//Processing
					$rowroom = $rroom->fetch_assoc();//Processing
					
					$type = $rowroom['type'];	//type
					
	?>
				<div class="container mt-5">
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['idnum']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $type; ?></td>
					<form action="access.php" method="POST" >
					<td><button name="ubtn" value="<?php echo $row['username']; ?>" >User</button>
					<button name="abtn" value="<?php echo $row['username']; ?>" >Admin</button>
					<button name="rbtn" value="<?php echo $row['username']; ?>" >Root</button></td>
					</form>
				</tr>
            	
	<?php			
					}
				
				}
		}
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
