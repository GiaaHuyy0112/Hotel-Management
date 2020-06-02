<?php
	require_once("../conn.php");
	$idnum = $_GET['idnum'];
	$sqlb = "DELETE FROM customer WHERE idnum = '$idnum'";
	if($conn->query($sqlb)){
		echo "<script>
				alert('Hủy thành công!');
				window.location.href='room.php';
				</script>";
	}
	else {
		die("Error deleting record: " . $conn->error);
		}
	$conn->close();
?>