<?php
	session_start();
	require_once("func.php");
	
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$login = "SELECT * FROM user WHERE (username = '$username' AND password = '$password')";
		require_once("../doan/conn.php");
		$result = $conn->query($login);
		$row = $result->fetch_assoc();
		if ($result->num_rows > 0) {
			$name = $row['name']; // Get ten user
			$_SESSION["username"] = $_POST["username"]; //SS == username;
			$_SESSION["name"] = $name; //SS == name;
			$type = $row['idtype']; //Get idtype in user
			
			$gettype = "SELECT type FROM typeuser WHERE (idtype = '$type')"; //Get type in typeuser
			$resultt = $conn->query($gettype);
			$rowt = $resultt->fetch_assoc();
			$role = $rowt['type']; // Set role = type of typeuser
			
			if( $role == "root"){
				$_SESSION["role"] = "root";
			}
			elseif ($role == "admin"){
				$_SESSION["role"] = "admin";
			}
			else {
				$_SESSION["role"] = "user";
			}
			echo "<script>
				alert('Đăng nhập thành công!');
				window.location.href='index.php';
				</script>";
		}
		else {
			echo "<script>
				alert('Username hoặc Password không đúng!');
				window.location.href='login.php';
				</script>";
		}
	}
?>