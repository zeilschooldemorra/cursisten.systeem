<!DOCTYPE html>
<html>
<head>
	<title>Morra cursisten systeem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
body{
	background-color: rgb(20,20,20);
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
	height: 20%;
	margin: 0 auto;
}
</style>
<body>
      <button style="position: absolute; top: 0; margin: 0.5%;" onclick="location.href='index.php'" class="btn btn-secondary float-left">Menu</button>
	 <?php 
  if(isset($_GET['pw'])){
    $pw = $_GET['pw'];
    if($pw == "-2084051690"){
      ?>
	<h2 class="text-center display-4">Aanmeldingen</h2>
	<?php

		if(isset($_GET['message'])){
			?>
				<div id='message' style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-success">
				  <p class="text-center"><strong>Gelukt!</strong> <?php echo $_GET['message']; ?> is succesvol toegevoegd!</p>
				</div>
				<script type="text/javascript">
					setTimeout(function(){
						element = document.getElementById('message')
					    var op = 1;  // initial opacity
					    var timer = setInterval(function () {
					        if (op <= 0.1){
					            clearInterval(timer);
					            element.style.display = 'none';
					        }
					        element.style.opacity = op;
					        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
					        op -= op * 0.1;
					    }, 100);
					}, 2000);
				</script>
			<?php
		}
		if(isset($_GET['error'])){
			?>
				<div id="error" style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-danger">
				  <strong>Oeps!</strong> Er is iets mis gegaan met het toevoegen van <?php echo $_GET['error']; ?>
				</div>
				<script type="text/javascript">
					setTimeout(function(){
						element = document.getElementById('error')
					    var op = 1;  // initial opacity
					    var timer = setInterval(function () {
					        if (op <= 0.1){
					            clearInterval(timer);
					            element.style.display = 'none';
					        }
					        element.style.opacity = op;
					        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
					        op -= op * 0.1;
					    }, 100);
					}, 2000);
				</script>
			<?php
		}

		include ('config.php');

		ini_set('display_errors', '1');

		$sql = 'SELECT * FROM cursisten ORDER BY ticket';

		$result = mysqli_query($conn, $sql);

		$curs = mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);

		mysqli_close($conn);
	?>
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
		</tr>
		<?php foreach ($curs as $cur) { 
			if($cur['picture'] == 0){
              $picture = "Nee, liever niet";
            } else {
              $picture = "Ja, dit mag";
            }
		?>
		<tr style="<?php if($cur['camp']){echo "background-color: lightgrey;";} ?>" class="pickable" onclick="getCursist('<?php echo $cur['id'] ?>', '<?php echo $cur['name']?>')" data-toggle="modal" data-target="#myModal">
			<td><?php echo $cur['ticket']?></td>
			<td><?php echo $cur['name']?></td>
			<td><?php echo $cur['adress']?></td>
			<td><?php echo $cur['postal']?></td>
			<td><?php echo $cur['birthday']?></td>
			<td><?php echo $cur['birthplace']?></td>
			<td><?php echo $picture ?></td>
			<td><?php echo $cur['notes']?></td>
			<td><?php echo $cur['cwo']?></td>
		</tr>
		<?php } ?>
	</table>
	<div id="data"></div>

	<!-- modal -->
	<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Aanmelden</h4>
          <button class="close" data-dismiss="modal">&times;</button>
  			<form method="get" action="signup.php" id="signUp">

         		<input type="hidden" id="cursId" name="cursId" value="" />
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<input type="hidden" id="cursName" name="cursName" value="" />
        	<p>Wilt u <strong id="cursName1"></strong> aanmelden?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal">Annuleren</button>
          <input type="submit" name="submit" class="btn btn-success" value="Aanmelden">
          </form>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
	body{
		background-color: white;
	}
	.pickable:hover{
		background-color: lightblue;
		cursor: pointer;
	}
</style>
<script type="text/javascript">
		var id = 0;
	function getCursist(id_curs, name_curs){
		document.getElementById("cursId").value = id_curs;
		document.getElementById("cursName").value = name_curs;
		document.getElementById("cursName1").innerHTML = name_curs;
	}

</script>
  
      <?php
    } else{
      ?>
        <form method="get">
          <h1 style="color: red; margin-top: 10%;" class="text-center display-3">Verkeerd wachtwoord!</h1>
          <div class="container" style="margin-top: 5%;">
          <h2 style="color: lightgrey"; class="text-center display-4">Kamp schipper</h2>
          <div class="card">
              <h4>Wachtwoord:</h4>
            <div class="d-inline-flex p-2">
              <input id="pw" class="form-control" type="password" name="pw">
              <input onclick="hasher()" type="submit" class="btn btn-success" value="Verzenden">
            </div>
          </div>
        </div>
      </form>
      <?php
    }
  } else {
    ?>
     <form method="get">
        <div class="container" style="margin-top: 18%;">
          <h2 style="color: lightgrey"; class="text-center display-4">Kamp schipper</h2>
        <div class="card">
            <h4>Wachtwoord:</h4>
          <div class="d-inline-flex p-2">
            <input id="pw" class="form-control" type="password" name="pw">
            <input onclick="hasher()" type="submit" class="btn btn-success" value="Verzenden">
          </div>
        </div>
        </div>
      </form>
    <?php
  }
  ?>
  <p>Skippert</p>

  <script type="text/javascript">
      function hasher(){
        var val = document.getElementById("pw").value; 
        var hash = 0;
        for (var i = 0; i < val.length; i++) {
            var character = val.charCodeAt(i);
            hash = ((hash<<5)-hash)+character;
            hash = hash & hash; // Convert to 32bit integer
        }
        document.getElementById("pw").value = hash;
      }
  </script>
</body>
</html>

