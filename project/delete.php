<?php
	$idnum = $_GET['idnum'];

	$del = "DELETE FROM customer WHERE idnum = $idnum ";
	require_once("conn.php");
	if($conn->query($del)){
		echo "<script>
				alert('Hủy đặt phòng thành công!');
				window.location.href='bookinginfo.php';
				</script>";
	}
	else {
		die("Error deleting record: " . $conn->error);
		}
	$conn->close();
	
?>