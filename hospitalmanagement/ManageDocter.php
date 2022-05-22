<!DOCTYPE html>
<html>
<head>
<?php 
session_start();
?>
<title>Gimso Fitness </title>
<!-- Custom Styling -->
 <link rel="stylesheet" href="css/style.css">
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css'>
    <!-- <link rel="stylesheet" href="css/style.css"> -->


</style>
</head>
<body>

<div class="topnav">
<center><h1  style="color:#ffffff;">abcd.com</h1></center>
  <a class="active" href="ManageDocter.php">Home</a>
  <a href="#">About</a>
  <a href="index.html">Doctor</a>  

</div><!-- end of the header -->
<br>

<div >

    <div class="textt">
		<h5 class="appname">Manage Docter</h5>
	    </div >	
			<div class="rec22">
					<?php require_once "dbConnect.php";
						$queryLogin = "SELECT * FROM user";
						$result = $conn -> query($queryLogin);
						$dataSet = $result -> fetch_array(MYSQLI_ASSOC);
					?>
		<form action="userpropile">
			<input type="submit" value="Docter Registration" />
		</form>
		<form action="#">
			<input type="submit" value="Genarate Report" />
		</form>
				<div class="table">	
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Address</th>
								<th>Action</th>
								<th>Action2</th>
							</tr>
						</thead>					
						<?php while ($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $row["f_name"]; ?></td>
								<td><?php echo $row["email"]; ?></td>
								
								<td>
									<a href="userpropile/?edit=<?php echo $row['f_name']; ?>" class="edit_btn" >Edit</a>
								</td>
								<td>
									<a name="del3" href="editBlog.php?del2=<?php echo $row['f_name']; ?>" class="del_btn">Delete</a>
								</td>
							</tr>
						<?php }
						 ?>

						<?php require_once "dbConnect.php";
							$queryLogin = "SELECT * FROM user";
							$result = $conn -> query($queryLogin);
							$dataSet = $result -> fetch_array(MYSQLI_ASSOC);
						?>  
						<thead>
							<tr>
								<th>Name</th>
								<th>Address</th>
								<th>Action</th>
								<th>Action2</th>
							</tr>
						</thead>
						
						<?php while ($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $row["f_name"]; ?></td>
								<td><?php echo $row["email"]; ?></td>
								
								
								<td>
									<a name="del3" href="editBlog.php?del2=<?php echo $row['f_name']; ?>" class="del_btn">Search</a>
								</td>
							</tr>
						<?php } ?>
							
					</table>
				</div>
					<br>
					<table>
						
					</table>
				<div class="form-input">
					
				</div>
			</div>		
		</div>
</div>
<br>

<!-- footer create-->
<footer clas="footer">
					
</footer>
</body>
</html>