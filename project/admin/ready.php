<?php 

	require_once("../conn.php");
	require_once("../func.php");
	
	$id = $_GET["id"];
	$sqls = "UPDATE room SET isready = 'ready', edate = '00-00-0000' WHERE id =$id";
	if ($conn->query($sqls)) 
	{
		echo alert("Thành công");
	} 
	else 
	{
		die("Error updating record: " . $conn->error);
	}
?>