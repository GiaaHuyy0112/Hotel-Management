<?php
	session_start();
	require_once("../conn.php");
	function alert($msg) {
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		}
		
	$idnum = $_GET["idnum"];
	$sel = "SELECT * FROM customer WHERE (idnum = '$idnum')"; //Get info customer
		$result = $conn->query($sel); //processing
		$rowsel = $result->fetch_assoc(); //processing
		if( $rowsel['checkin'] == 0){
			echo "<script>
				alert('Khách chưa nhận phòng! Không thể thanh toán!');
				window.location.href='manage.php';
				</script>";
		}
		else{
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$nowdate= date('Y/m/d');
							//$edate = $rowsel['edate'];	//ngay di
				$namecus = $rowsel['name'];	//name of customer
				$phone = $rowsel['phone'];	//phone of customer
				$room = $rowsel['room'];	//room
				$adate = $rowsel['adate'];	// ngay den
				$nadate = date("Y-m-d", strtotime($adate));
				$idservice = $rowsel['idservice'];	//dich vu
				$nameem = $_SESSION['name'];//name of employee
				
			$sqlidcat = "SELECT * FROM room WHERE (room = '$room')";//Get idcat from customer
				$result2 = $conn->query($sqlidcat); // processing
				$rowid = $result2->fetch_assoc(); //processing
				$idcat = $rowid['idcat']; //idcat
				
			$sqlprice = "SELECT * FROM category WHERE (idcat = '$idcat')"; //Get price
				$rprice = $conn->query($sqlprice); //processing
				$rowprice = $rprice->fetch_assoc(); //processing
				$price = $rowprice['price']; //price
				$cat = $rowprice['namecat']; //name category
				
			$sqlservice = "SELECT * FROM service WHERE (idservice = '$idservice')"; //Get price
				$rservice = $conn->query($sqlservice); //processing
				$rowservice = $rservice->fetch_assoc(); //processing
				$priceservice = $rowservice['price']; //price
				$nameservice = $rowservice['nameservice']; //name service

			$dd = "SELECT DATEDIFF('$nowdate', '$nadate') AS ngay ";//DATEDIFF
					$rdate = $conn->query($dd); //processing
					$rowdate = $rdate->fetch_assoc(); //processing
					$ngay = $rowdate['ngay'];
			
			
					
								//date_default_timezone_set('Asia/Ho_Chi_Minh');
				$now= date('Y/m/d H:i:s');
								//$nowdate= date('Y/m/d');
								//if($nowdate != $edate){
								//	$edate = $nowdate;
								//}
								//else{
					
								//}
					
				$midday = "17:00:00";
				$nowtime = date('H:i:s');
				$day = 1;
				
				if($nowtime < $midday){
					$total = ((($ngay - $day) * $price)+ ($priceservice * $ngay));
				}
				else{
					$total = (($ngay * $price) + ($priceservice * $ngay));
				}
				if($total < 0){
					$total = 0;
				}
				
			$ins = "INSERT INTO bill (namecus, idnum, phone, nameem, room, category, nameservice, adate, edate, price, date)
					VALUES ('$namecus', '$idnum', '$phone' , '$nameem', '$room', '$cat', '$nameservice', '$nadate', '$nowdate', '$total', '$now')";
			if ($conn->query($ins) === TRUE) {
				$del = "DELETE FROM customer WHERE (idnum = '$idnum')"; //Del customer in customer
				if ($conn->query($del) === TRUE) {
					header("Location:bill.php");
				} else {
					die("Error deleting record: " . $conn->error);
				}
			} else {
				die("Error inserting record: " . $conn->error);
			}
		}
		


?>