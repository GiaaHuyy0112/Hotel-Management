<?php
	require_once("../conn.php");
	$idnum = $_GET['idnum'];
	$sqlb = "DELETE FROM bill WHERE idnum = '$idnum'";
	if($conn->query($sqlb)){
		echo "<script>
				alert('Xóa đơn thành công!');
				window.location.href='bill.php';
				</script>";
	}
	else {
		die("Error deleting record: " . $conn->error);
		}
	$conn->close();
?>