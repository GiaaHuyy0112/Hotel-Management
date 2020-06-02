<?php
	require_once("../conn.php");
	$idnum = $_GET['idnum'];
	$sqlb = "UPDATE customer SET checkin = '1' WHERE idnum = '$idnum'";
	if($conn->query($sqlb)){
		echo "<script>
				alert('Checkin thành công!');
				window.location.href='manage.php';
				</script>";
	}
?>