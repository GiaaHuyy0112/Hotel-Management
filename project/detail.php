<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="css/bg.css">
	<link rel="stylesheet" type="text/css" href="css/flipcard.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>5StarHotel Category</title>

  <!-- Bootstrap core CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
	
  <!-- Navigation -->
  <?php include 'navigation.php' ?>
	<style>
		h1{
			color: white;
		}
		#card{
			padding: 20px;
			
		}
	</style>
  <!-- Page Content -->
	<div id="form" class="container wrapper">
		<h1>Giới thiệu</h1>
		<div class="row">
	<?php
		$images = "SELECT * FROM images WHERE 1";
		require_once("conn.php");
		$result = $conn->query($images);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$idcat = $row['idcat'];
				$cat = "SELECT * FROM category WHERE (idcat = $idcat )";
				$rcat = $conn->query($cat);
				$rowcat = $rcat->fetch_assoc();
	?>
		<div id="card"  class="w3-container">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
						<img src="uploads/<?php echo $row["name"] ?>" style="width:300px;height:300px;">
					</div>
					<div class="flip-card-back">
					<h1><?php if($rowcat['idcat'] == $row['idcat']){
							echo $rowcat['namecat'];}
							?></h1>
					<p><?php if($rowcat['idcat'] == $row['idcat']){
							echo "-Không bao gồm ăn sáng";}
							?></p>
							<p><?php if($rowcat['idcat'] == $row['idcat']){
							echo "-${rowcat['description']}";}
							?></p>
							<p><?php if($rowcat['idcat'] == $row['idcat']){
							echo "-Diện tích ${rowcat['ac']}";}
							?></p>
					<p><?php if($rowcat['idcat'] == $row['idcat']){
							echo "-${rowcat['price']}VND Chưa gồm VAT";}
							?></p>
					</div>
				</div>
			</div>
		</div>
	<?php
			}
		}
	?>
		</div>
	<div class="push"></div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php require("footer.php"); ?>

  <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>
