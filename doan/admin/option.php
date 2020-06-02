<?php
	session_start();
	require_once("../conn.php");
	require_once("../func.php");
	if (isset($_GET["type"]) && isset($_GET["id"]))
	{
		$type = $_GET["type"];
		$idroom = $_GET["id"];
		if($type == "del"){
			if($_SESSION['role'] == "root")
			{
				$sql = "DELETE FROM room WHERE idroom=$idroom";

				if ($conn->query($sql) === TRUE) {
					echo alert("Xóa thành công!");
				} else {
					die("Error deleting record: " . $conn->error);
				}

				$conn->close();

			}
			else
			{
				echo "<script>
					alert('Bạn không có quyền xóa!');
					window.location.href='room.php';
					</script>";
			}
		}
		elseif($type == "ready"){
			$sqls = "UPDATE room SET isready = 'ready', edate = '0' WHERE idroom =$idroom";
			if ($conn->query($sqls)) 
			{
				header("Location:room.php");
			} 
			else 
			{
				die("Error updating record: " . $conn->error);
			}
		}
		elseif($type == "busy"){
			$sqlb = "UPDATE room SET isready = 'not ready', edate = '3000-12-1' WHERE idroom =$idroom";
			if ($conn->query($sqlb)) 
			{
				header("Location:room.php");
			} 
			else 
			{
				die("Error updating record: " . $conn->error);
			}
		}
	}
	
	
	
	
?>