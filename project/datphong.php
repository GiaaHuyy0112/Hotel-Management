<?php
	require_once("../doan/conn.php");
	require_once("func.php");
	if (isset($_POST["name"]) && isset($_POST["idnum"]) && isset($_POST["phone"]) 
			&& isset($_POST["category"]) ) {
		$name = $_POST["name"];
		$idnum = $_POST["idnum"];
		$phone = $_POST["phone"];
		$idcat = $_POST["category"];
		$adate = $_POST["adate"];
		$edate = $_POST["edate"];
		if (isset($_POST["service"])){
			$service = $_POST["service"];
		}
		else{
			$service = 2;
		}
		$idnum = $_POST["idnum"];
		$sqlid = "SELECT * FROM customer WHERE idnum = '$idnum'";
		require_once("../doan/conn.php");
		$r = $conn->query($sqlid);
		if ($r->num_rows > 0) {
				echo "<script>
					alert('Quý khách đã đặt phòng rồi!');
					window.location.href='bookinginfo.php';
					</script>";
			
		}
		else {
			$name = $_POST["name"];
			$idnum = $_POST["idnum"];
			$phone = $_POST["phone"];
			$idcat = $_POST["category"];
			$adate = $_POST["adate"];
			$edate = $_POST["edate"];
			if (isset($_POST["service"])){
				$service = $_POST["service"];
			}
			else{
				$service = 2;
			}
			$sqlroom = "SELECT room FROM room WHERE (idcat = '$idcat') AND
				(isready = 'ready' || edate < '$adate')";
			$r = $conn->query($sqlroom);
			$room = $r->fetch_assoc();
			$roomnum = $room['room'];
			
			
			if ($r->num_rows > 0) {
				$sqlins = "INSERT INTO customer (name, idnum, phone,  room, adate, edate, idservice)
						VALUES ('$name', '$idnum', '$phone', '$roomnum', '$adate', '$edate', '$service')";
				if($conn->query($sqlins)){
					$sqlb = "UPDATE room SET isready = 'not ready',edate = '$edate' WHERE room = '$roomnum'";
					$result = $conn->query($sqlb);
					if($conn->query($sqlb)){
						echo "<script>
							alert('Đặt phòng thành công!');
							window.location.href='bookinginfo.php';
							</script>";
					}
					else{
						die("Error updating record: " . $conn->error);
					}
				}
				else{
					die("Error updating record: " . $conn->error);
				}
			
			}
			else{
				echo "<script>
				alert('Hết phòng! Quý khách thông cảm!');
				window.location.href='index.php';
				</script>";
			}
		}
	}

?>