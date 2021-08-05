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
      <button style="position: absolute; top: 0; margin: 0.5%;" onclick="location.href='index.php'" class="btn btn-secondary float-left">Menu</button>

  <?php 
  if(isset($_GET['pw'])){
    $pw = $_GET['pw'];
    if($pw == "898654838"){
      ?>

    <?php
  include ('config.php');
  
  if(isset($_GET['sql'])){

    $sql = $_GET['sql'];

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
      
    if(mysqli_query($conn, $sql)){
    ?>
    <div id='message' style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-success">
        <p class="text-center"><strong>Gelukt!</strong> De lijst is succesvol toegevoegd!</p>
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
    } else{
       ?>
      <div id="error" style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-danger">
        <strong>Oeps!</strong> Er is iets mis gegaan met het toevoegen van de lijst!
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

    mysqli_close($conn);



   }

   if(isset($_GET['del'])){

    if (!$conn) {
      die('Could not connect: ' . mysqli_error($conn));
    }

    $sql = "DELETE FROM wallstaf";
    $sql1 = "DELETE FROM cursisten";
      
   if ($conn->query($sql1) === TRUE && $conn->query($sql) === TRUE) {
      ?>
    <div id='del1' style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-success">
        <p class="text-center"><strong>Gelukt!</strong> De lijst is succesvol verwijderd!</p>
      </div>
      <script type="text/javascript">
        setTimeout(function(){
          element = document.getElementById('del1')
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
   } else {
           ?>
      <div id="del0" style="position: absolute; width: 20%; margin-top: 1%; margin-left: 40%;" class="alert alert-danger">
        <strong>Oeps!</strong> Er is iets mis gegaan met het verwijderen van de lijst!
      </div>
      <script type="text/javascript">
        setTimeout(function(){
          element = document.getElementById('del0')
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
    mysqli_close($conn);
  }


  ?>
  <div class="box">
    <a><button data-toggle="modal" data-target="#myModal" class="button btn btn-outline-success btn-lg">Lijst toevoegen</button></a>
    <a><button data-toggle="modal" data-target="#verwijder" class="button btn btn-outline-danger btn-lg">Lijst verwijderen</button></a>
  </div>
    <!-- modal -->
<div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Toevoegen</h4>
            <button class="close text-right" data-dismiss="modal">&times;</button>
          <form method="get" action="">
              <input id="pw" class="form-control" type="hidden" name="pw" value="898654838">
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <label>Voeg hier de sql in!</label>
            <input class="form-control" type="textarea" name="sql">
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button style="width: 20%; margin-right: 57%;" class="btn btn-danger float-left" data-dismiss="modal">Annuleren</button>
            <button style="width: 20%; float: right;" class="btn btn-success">Kiezen</button>
           </form>
          </div>
        </div>
      </div>
      </div>

    <!-- modal -->
<div class="modal fade" id="verwijder">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Verwijderen</h4>
            <button class="close text-right" data-dismiss="modal">&times;</button>
          <form method="get" action="">
              <input id="pw" class="form-control" type="hidden" name="pw" value="898654838">

          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <label>Weet je heel zeker dat je de lijst voor altijd wilt verwijderen?</label>
            <input type="hidden" name="del" value="del">
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button style="width: 20%; margin-right: 57%;" class="btn btn-warning float-left" data-dismiss="modal">Annuleren</button>
            <button style="width: 20%; float: right;" class="btn btn-danger">Verwijder</button>
           </form>
          </div>
        </div>
      </div>
      <?php
    } else{
      ?>
        <form method="get">
          <h1 style="color: red; margin-top: 10%;" class="text-center display-3">Verkeerd wachtwoord!</h1>
          <div class="container" style="margin-top: 5%;">
          <h2 style="color: lightgrey"; class="text-center display-4">Opperskip</h2>
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
          <h2 style="color: lightgrey"; class="text-center display-4">Opperskip</h2>
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
  <p>Flopper</p>
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
	height: 20%;
	margin: 0 auto;
}

.button{
	width: 100%;
	height: 100%;
}
</style>
</html>