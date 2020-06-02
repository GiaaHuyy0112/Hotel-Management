<?php
	require_once("../func.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="../index.php">5STARHOTEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
	<ul class="navbar-nav ml-auto">
	  <li class="nav-item active">
		<a class="nav-link" href="../index.php">Home
		  <span class="sr-only">(current)</span>
		</a>
	  </li>
	  <?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
				if($_SESSION['role'] == "root" ){
					echo '<li class="nav-item">
								<div class="dropdown">
								  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Quản lý
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="usermanage.php">Cấp quyền</a>
									<a class="dropdown-item" href="formadd.php">Thêm phòng</a>
									<a class="dropdown-item" href="category.php">Thêm ảnh loại phòng</a>
									<a class="dropdown-item" href="room.php">Quản lý phòng</a>
									<a class="dropdown-item" href="manage.php">Quản lý khách</a>
									<a class="dropdown-item" href="bill.php">Thống kê</a>
									<a class="dropdown-item" href="mailmanage.php">Email khách đăng ký</a>
								  </div>
								</div>
							</li>';
				}if($_SESSION['role'] == "admin" ){
					echo '<li class="nav-item">
								<div class="dropdown">
								  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Quản lý
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="room.php">Quản lý phòng</a>
									<a class="dropdown-item" href="manage.php">Quản lý khách</a>
									<a class="dropdown-item" href="bill.php">Thống kê</a>
									<a class="dropdown-item" href="mailmanage.php">Email khách đăng ký</a>
								  </div>
								</div>
							</li>';
				}
				echo '<li class="nav-item">
					<a class="nav-link" href="../logout.php">Logout</a>
					</li>';
			}
       ?>
	  <li class="nav-item">
		<a class="nav-link" href="../about.php">About Us</a>
	  </li>
	</ul>
  </div>
</div>
</nav>