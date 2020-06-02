<?php
	require_once("func.php");
	require_once("conn.php");
	if (isset($_POST["email"])){
		$email = $_POST["email"];
		$sql = "INSERT INTO email(email) VALUES ('$email')";
		if ($conn->query($sql)){
			echo "<script>
					alert('Đăng ký nhận tin thành công!');
					window.location.href='index.php';
					</script>";
		}
		else{
			die("Error registing record: " . $conn->error);
		}
	}
?>