<!DOCTYPE html>
<html>
<head>
	<title>Morra cursisten systeem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<button style="position: absolute; margin: 0.5%;" onclick="location.href='index.php'" class="btn btn-secondary float-left">Menu</button>
	<h2 class="text-center display-4">Cursist toevoegen</h2>
	<?php

		$camp = $_POST['camp'];

		include ('config.php');

		ini_set('display_errors', '1');

		$sql = "SELECT * FROM cursisten WHERE camp = '$camp'";

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
		</tr>
		<?php foreach ($curs as $cur) { 
			if($cur['picture'] == 0){
              $picture = "Nee, liever niet";
            } else {
              $picture = "Ja, dit mag";
            }
		?>
		<tr style="<?php if($cur['camp']){echo "background-color: white;";}else{echo "background-color: lightgrey;";} ?>" class="pickable" onclick="getCursist('<?php echo $cur['id'] ?>', '<?php echo $cur['name']?>')" data-toggle="modal" data-target="#myModal">
			<td><?php echo $cur['ticket']?></td>
			<td><?php echo $cur['name']?></td>
			<td><?php echo $cur['adress']?></td>
			<td><?php echo $cur['postal']?></td>
			<td><?php echo $cur['birthday']?></td>
			<td><?php echo $cur['birthplace']?></td>
			<td><?php echo $picture ?></td>
			<td><?php echo $cur['notes']?></td>
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
          <h4 class="modal-title">Toevoegen</h4>
          <button class="close" data-dismiss="modal">&times;</button>
  			<form method="post" action="wallstaf_add_verwerk.php" id="signUp">

         		<input type="hidden" id="cursId" name="id" value="" />
         		<input type="hidden" name="camp" value="<?php echo $camp; ?>" />
         		<input type="hidden" id="cursName" name="name" value="<?php echo $name; ?>" />


        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<p>Wilt u <strong id="cursName1"></strong> aan <?php echo $camp; ?> toevoegen?</p>

        	<label>extra:</label>
	        <input class="form-control" type="text" name="extra" value=""><br/>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal">Annuleren</button>
          <input type="submit" name="submit" class="btn btn-success" value="Toevoegen">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
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
	function getCursist(id_curs, name_curs){
		document.getElementById("cursId").value = id_curs;
		document.getElementById("cursName").value = name_curs;
		document.getElementById("cursName1").innerHTML = name_curs;
	}

</script>
</html>

