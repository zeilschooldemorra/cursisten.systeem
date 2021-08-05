<!DOCTYPE html>
<html>
<head>
	<title>Morra cursisten systeem</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
	body{
		background-color: rgb(20,20,20);
		height: 10vh;
	}

	.box{
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		vertical-align: center;
		height: 100vh;
		padding: 10%;
	}

	form{
		height: 100%;
	}

	span{
		width: 40%;
		height: 20%;
		margin: 0 auto;
	}

	button{
		width: 100%;
		height: 100%;
	}
</style>
</head>
<body>
	<div class="box">
		<span><form method="get"><input type="hidden" name="camp" value="kinderkamp"><button class="btn btn-primary btn-lg">Kinderkamp</button></form></span>
		<span><form method="get"><input type="hidden" name="camp" value="11/13"><button class="btn btn-success btn-lg">11/13</button></form></span>
		<span><form method="get"><input type="hidden" name="camp" value="14/19"><button class="btn btn-info btn-lg">14/19</button></form></span>
	</div>

	<?php 
	if(isset($_GET['camp'])){
		
		include ('config.php');

		ini_set('display_errors', '1');

		$camp = $_GET['camp'];

		$sql = "SELECT * FROM cursisten WHERE camp='$camp' ORDER BY ticket";

		$result = mysqli_query($conn, $sql);

		$curs = mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);

		mysqli_close($conn);

		if($camp=="kinderkamp"){
			$back = "lightblue";
		}elseif($camp=="11/13"){
			$back = "lightgreen";
		}else{$back = "rgb(168, 255, 255)";}

		echo "<style>body{background-color: $back;} .box{display: none;}</style>";
	?>
	<h1 class="display-4 text-center"><?php echo $camp; ?></h1>
	<table class="table">
		<tr>
			<th >Discipline</th>
			<th>Naam</th>
			<th>Straat + huisnummer</th>
			<th>Postcode + plaats</th>
			<th>Geboorte datum</th>
			<th>Geboorte plaats</th>
			<th>Foto</th>
			<th>bijzonderheden</th>
			<th>cwo</th>
			<?php if($camp=="kinderkamp"){ echo "<th>Telefoonnummer</th>";} ?>
		</tr>
		<?php foreach ($curs as $cur) { 
			if($cur['picture'] == 0){
              $picture = "Nee, liever niet";
            } else {
              $picture = "Ja, dit mag";
            }
		?>
		<tr>
			<td><?php echo $cur['ticket']?></td>
			<td><?php echo $cur['name']?></td>
			<td><?php echo $cur['adress']?></td>
			<td><?php echo $cur['postal']?></td>
			<td><?php echo $cur['birthday']?></td>
			<td><?php echo $cur['birthplace']?></td>
			<td><?php echo $picture ?></td>
			<td><?php echo $cur['notes']?></td>
			<td><?php echo $cur['cwo']?></td>
			<?php if($camp=="kinderkamp"){ echo "<td>".$cur['phone']."</td>";} ?>
		</tr>
		<?php } }?>

</body>
</html>