<!DOCTYPE html>
<html>
<head>
	<title>Morra cursisten systeem</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
	body{
		background-color: rgb(173, 173, 255);
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
   <button style="position: absolute; top:0; width: 7%; height: 50px; margin: 0.5%;" onclick="location.href='index.php'" class="btn btn-secondary float-left">Menu</button>

  <?php 
  if(isset($_GET['pw'])){
    $pw = $_GET['pw'];
    if($pw == "206586613"){
      ?>

 
	<div class="box">
              
		<span><form method="get"><input id="pw" class="form-control" type="hidden" name="pw" value="206586613"><input type="hidden" name="camp" value="kinderkamp"><button class="btn btn-primary btn-lg">Kinderkamp</button></form></span>
		<span><form method="get"><input id="pw" class="form-control" type="hidden" name="pw" value="206586613"><input type="hidden" name="camp" value="11/13"><button class="btn btn-success btn-lg">11/13</button></form></span>
		<span><form method="get"><input id="pw" class="form-control" type="hidden" name="pw" value="206586613"><input type="hidden" name="camp" value="14/19"><button class="btn btn-info btn-lg">14/19</button></form></span>
	</div>
	<?php
	if(isset($_GET['message'])){
		?>
			<div id='message' style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-success">
			  <p class="text-center"><strong>Gelukt!</strong> <?php echo $_GET['message']; ?> is succesvol gewijzigd/toegevoegd!</p>
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
			  <strong>Oeps!</strong> Er is iets mis gegaan met het wijzigen/toevoegen van <?php echo $_GET['error']; ?>
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
	if(isset($_GET['delete'])){
		?>
			<div id='message' style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-success">
			  <p class="text-center"><strong>Gelukt!</strong> <?php echo $_GET['delete']; ?> is succesvol verwijderd!</p>
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
	if(isset($_GET['!delete'])){
		?>
			<div id="error" style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-danger">
			  <strong>Oeps!</strong> Er is iets mis gegaan met het verwijderen van <?php echo $_GET['!delete']; ?>
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

	if(isset($_GET['camp'])){
		
		include ('config.php');

		ini_set('display_errors', '1');

		$camp = $_GET['camp'];

		$sql = "SELECT * FROM wallstaf WHERE camp='$camp'";

		$result = mysqli_query($conn, $sql);

		$curs = mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);

		if($camp=="kinderkamp"){
			$back = "lightblue";
		}elseif($camp=="11/13"){
			$back = "lightgreen";
		}else{$back = "rgb(168, 255, 255)";}

		echo "<style>body{background-color: $back;} .box{display: none;}</style>";
	?>
	<button style="position: absolute; width: 13%; height: 50px; margin: 0.5% 0% 0% 85%;" data-toggle="modal" data-target="#toevoeg" class="btn btn-success float-left">Toevoegen</button>
	<button style="position: absolute; width: 7%; height: 50px; margin: 0.5% 0% 0% 9%;" onclick="location.href='wallstaf.php?pw=206586613'" class="btn btn-primary float-left">Terug</button>
	<h1 class="display-4 text-center"><?php echo $camp; ?></h1>
	<table class="table">
		<tr>
			<th >Discipline</th>
			<th>Naam</th>
			<th>Straat + huisnummer</th>
			<th>Postcode + plaats</th>
			<th>Geboorte datum</th>
			<th>Geboorte plaats</th>
			<th>Bijzonderheden</th>
			<th>Extra</th>
			<?php if($camp=="kinderkamp"){ echo "<th>Telefoonnummer</th>";} ?>
			<th>bewerk<th>
		</tr>
		<?php foreach ($curs as $cur) { 

			$id = $cur['curs_id'];

			$query = "SELECT * FROM cursisten WHERE id='$id'";

			$result1 = mysqli_query($conn, $query);

         	if (mysqli_num_rows($result1) == 0) {
                echo "<p>Er zijn geen gegevens gevonden</p>";
          	}
			
			while($row = mysqli_fetch_array($result1)) {
		?>
		<tr>
			<td><?php echo $row['ticket']?></td>
			<td><?php echo $row['name']?></td>
			<td><?php echo $row['adress']?></td>
			<td><?php echo $row['postal']?></td>
			<td><?php echo $row['birthday']?></td>
			<td><?php echo $row['birthplace']?></td>
			<td><?php echo $row['notes']?></td>
			<td><?php echo $cur['extra']?></td>
			<?php if($camp=="kinderkamp"){ echo "<td>".$row['phone']."</td>";} ?>
			<td><form metod="get"><input  type="hidden" name="camp" value="<?php echo $cur['camp'] ?>" /><input id="pw" class="form-control" type="hidden" name="pw" value="206586613"><input type="hidden" name="id" value="<?php echo $row['id'] ?>"><button class="btn btn-secondary">Bewerk</button></form><td>
		</tr>
		<?php }} }?>
		<div class="modal fade" id="toevoeg">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Toevoegen</h4>
	          <button class="close text-right" data-dismiss="modal">&times;</button>
	  			<form method="post" action="wallstaf_add.php">
              <input id="pw" class="form-control" type="hidden" name="pw" value="206586613">

	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	        	<p>Weet u zeker dat u iemand aan <?php echo $camp; ?> wilt toevoegen</p>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	        	<input type="hidden" name="camp" value="<?php echo $camp ?>">
	          <button style="width: 20%; margin-right: 57%;" class="btn btn-danger float-left" data-dismiss="modal">Annuleren</button>
	          <button style="width: 20%; float: right;" class="btn btn-success">Kiezen</button>
	         </form>
	        </div>
	      </div>
	    </div>
	  	</div>

	<?php 
		if(isset($_GET['id'])){

			$id1 = $_GET['id'];

			$query = "SELECT * FROM wallstaf WHERE curs_id='$id1'";

			$result2 = mysqli_query($conn, $query);

         	if (mysqli_num_rows($result2) == 0) {
                echo "<p>Er zijn geen gegevens gevonden</p>";
          	}
			
			while($row = mysqli_fetch_array($result2)) {
				$query1 = "SELECT * FROM cursisten WHERE id='$id1'";

				$result3 = mysqli_query($conn, $query1);

	         	if (mysqli_num_rows($result3) == 0) {
	                echo "<p>Er zijn geen gegevens gevonden</p>";
	          	}

	          	while($num = mysqli_fetch_array($result3)) {

	?>
		<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Bewerken</h4>
	          <button style="width: 30%; margin-left: 50%;" onclick="getCursist('<?php echo $row['curs_id'] ?>', '<?php echo $num['name']?>')" class="btn btn-danger"  data-dismiss="modal" data-toggle="modal" data-target="#delete">Verwijderen</button>
	  			<form method="post" action="wallstaf_verwerk.php">
              		<input id="pw" class="form-control" type="hidden" name="pw" value="206586613">
	         		<input type="hidden" name="id" value="<?php echo $row['curs_id'] ?>" />
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	        	<label>Naam:</label>
	        	<input class="form-control" type="text" name="name" value="<?php echo $num['name'] ?>" readonly><br/>
	        	<label>extra:</label>
	        	<input class="form-control" type="text" name="extra" value="<?php echo $row['extra'] ?>"><br/>
	        	<label>kamp:</label>
	        	<select id='camp' class='form-control' name='camp'>
	        		<option value='kinderkamp' <?php if($row['camp']=="kinderkamp"){echo "selected";} ?>>Kinderkamp</option>
	        		<option value='11/13' <?php if($row['camp']=="11/13"){echo "selected";} ?>>11/13</option>
	        		<option value='14/19' <?php if($row['camp']=="14/19"){echo "selected";} ?>>14/19</option>
	        	</select><br/>

	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button style="width: 20%; margin-right: 57%;" class="btn btn-warning float-left" data-dismiss="modal">Annuleren</button>
	          <button style="width: 20%; float: right;" class="btn btn-success">Bewerken</button>
	          </form>
	        </div>
	      </div>
	    </div>
	  	</div>

	  	<div class="modal fade" id="delete">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Verwijderen</h4>
	          

	  			<form method="post" action="wallstaf_delete.php">

	         		<input type="hidden" id="cursId" name="id" value="" />
	         		<input type="hidden" id="cursName" name="name" value="" />
	         		<input type="hidden" name="camp" value="<?php echo $camp; ?>">

	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	        	<p>Weet u zeker dat u <strong id="cursName1"></strong> wilt verwijderen uit de lijst?</p>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button style="width: 20%; margin-right: 57%;" class="btn btn-danger float-left" data-dismiss="modal">Annuleren</button>
	          <button style="width: 20%; float: right;" class="btn btn-success">Verwijderen</button>
	          </form>
	        </div>
	      </div>
	    </div>
	  	</div>



	  	<script type="text/javascript">
			$('#myModal').modal('show');
		</script>
	  <?php } } } ?>
	  <script type="text/javascript">
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
          <h2 style="color: lightgrey"; class="text-center display-4">Wallstaf &hearts;</h2>
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
          <h2 style="color: lightgrey"; class="text-center display-4">Wallstaf &hearts;</h2>
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
  <p>Prinsesje</p>
</body>
</html>