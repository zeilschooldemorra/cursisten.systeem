<!DOCTYPE html>
<html>
<head>
	<title>Morra cursisten systeem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="box">
		<a href="opper.php"><button class="btn btn-outline-danger btn-lg">Opperskip</button></a>
		<a href="home.php"><button class="btn btn-outline-warning btn-lg">Kamp schippers</button></a>
		<a href="wallstaf.php"><button class="btn btn-outline-success btn-lg">Wallstaf &hearts;</button></a>
		<a href="instructeur.php"><button class="btn btn-outline-primary btn-lg">Instructeurs</button></a>
	</div>
</body>
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

a{
	width: 30%;
	height: 15%;
	margin: 0 auto;
}

button{
	width: 100%;
	height: 100%;
}
</style>
</html>