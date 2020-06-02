<?php
	require_once("func.php");

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		if($_POST["password"] == $_POST["repassword"]){
			$username = $_POST["username"];
			$name = $_POST["name"];
			$idnum = $_POST["idnum"];
			$phone = $_POST["phone"];
			$sqlsel = "SELECT username FROM user WHERE username = '$username'";
			require_once("../doan/conn.php");
			$r = $conn->query($sqlsel);
			if ($r->num_rows > 0) {
					echo "<script>
							alert('Username đã tồn tại!');
							window.location.href='login.php';
							</script>";
				
			}
			else {
				$username = $_POST["username"];
				$password = $_POST["password"];
				$sqlins = "INSERT INTO user (username, password, name, idnum, phone)
						VALUES ('$username', '$password', '$name', '$idnum', '$phone' )";
				$result = $conn->query($sqlins);
				echo "<script>
					alert('Đăng ký thành công!');
					window.location.href='login.php';
					</script>";
			}
		}
		else{
			echo "<script>
				alert('Password không trùng khớp!');
				window.location.href='login.php';
				</script>";
		}
	}
?>