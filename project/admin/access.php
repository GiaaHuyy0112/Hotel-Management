<?php
	require_once("../conn.php");
	require_once("../func.php");
	
	if (isset($_POST["ubtn"])){
		$username = $_POST["ubtn"];
		$access = 0;
	} 
	elseif (isset($_POST["abtn"])){
		$username = $_POST["abtn"];
		$access = 1;
	} 
	else{
		$username = $_POST["rbtn"];
		$access = 2;
	}
		
		$sqlins = "UPDATE user SET idtype='$access' WHERE (username = '$username')";
		if ($conn->query($sqlins)){
			echo "<script>
				alert('Cấp quyền thành công!');
				window.location.href='usermanage.php';
				</script>";
		}
?>