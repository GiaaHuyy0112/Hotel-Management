<?php
		

		//Thong bao
		function alert($msg) {
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		}
		
		//Dang xuat
		function logout(){
			session_start(); 
			if (isset($_SESSION['username']) )
			{
				unset($_SESSION['username']); // xóa session login
				unset($_SESSION['role']);
				unset($_SESSION['name']);
				header("Location: index.php");
			}
		}
		//Check thong tin session
		function checkss(){
			if (isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				if($_SESSION['role'] == "root" ){
					echo '<li class="nav-item">
								<div class="dropdown">
								  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Quản lý
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="admin/usermanage.php">Cấp quyền</a>
									<a class="dropdown-item" href="admin/formadd.php">Thêm phòng</a>
									<a class="dropdown-item" href="admin/category.php">Thêm ảnh loại phòng</a>
									<a class="dropdown-item" href="admin/room.php">Quản lý phòng</a>
									<a class="dropdown-item" href="admin/manage.php">Quản lý khách</a>
									<a class="dropdown-item" href="admin/bill.php">Thống kê</a>
								  </div>
								</div>
							</li>';
				}elseif($_SESSION['role'] == "admin" ){
					echo '<li class="nav-item">
								<div class="dropdown">
								  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Quản lý
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="admin/room.php">Quản lý phòng</a>
									<a class="dropdown-item" href="admin/manage.php">Quản lý khách</a>
									<a class="dropdown-item" href="admin/bill.php">Thống kê</a>
								  </div>
								</div>
							</li>';
				}
				else {
					echo '<li class="nav-item">
					<a class="nav-link" href="detail.php">Giới thiệu</a>
					</li>';
					echo '<li class="nav-item">
					<a class="nav-link" href="booking.php">Đặt phòng</a>
					</li>';
					echo '<li class="nav-item">
					<a class="nav-link" href="bookinginfo.php">Xem thông tin đặt phòng</a>
					</li>';
				}
				echo '<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
						</li>';
			}
			else{
				echo '<li class="nav-item">
					<a class="nav-link" href="detail.php">Giới thiệu</a>
					</li>';
				echo '<li class="nav-item">
					<a class="nav-link" href="booking.php">Đặt phòng</a>
					</li>';
				echo '<li class="nav-item">
					<a class="nav-link" href="bookinginfo.php">Xem thông tin đặt phòng</a>
					</li>';
				echo '<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
					</li>';
			}
		}
		
		//Thêm phòng//
		function addroom(){
			if (isset($_POST["room"]) && isset($_POST["category"]) && isset($_POST["floor"])
				&& isset($_POST["isready"]) && isset($_POST["edate"]) ) {
				require_once("../conn.php");
				$room = $_POST["room"];
				$idcat = $_POST["category"];
				$idfloor = $_POST["floor"];
				$price = $_POST["price"];
				$isready = $_POST["isready"];
				$edate = $_POST["edate"];
				/*
				$target_dir = "../uploads/";
				$file_name = basename($_FILES["fileUpload"]["name"]);
				$target_file = $target_dir . $file_name;
				*/
				$sqlroom = "SELECT room FROM room WHERE 
						room = '$room'";
				$r = $conn->query($sqlroom);
				if ($r->num_rows > 0) {
						echo alert("Phòng đã tồn tại");
					
				}
				else{
				//	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
				//	die("Sorry, there was an error uploading your file.");
				//}
				
				$sql = "INSERT INTO room (room, idcat, idfloor, isready, edate)
						VALUES ('$room', '$idcat','$idfloor', '$isready', '$edate')";
				$result = $conn->query($sql);
					echo alert("Thêm thành công!");
				}
				
			}
		}
?>