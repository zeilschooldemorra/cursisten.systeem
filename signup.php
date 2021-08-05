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
        background-color: black;
      }

      .jumbotron{
        margin-top: 10%;  
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="text-center">Aanmelden</h1>
    <form method="post" action="add.php" class="form-horizontal">
      
        <?php
        if(isset($_GET['submit'])){
          include ('config.php');

          $id = $_GET['cursId'];

          if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
          }

          $sql = "SELECT * FROM cursisten WHERE id = ".$id;

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) == 0) {
                echo "<p>Er zijn geen gegevens gevonden</p>";
          }

          while($row = mysqli_fetch_array($result)) {
            if($row['picture'] == 0){
              $false = "selected";
              $true = "";
            } else {
              $true = "selected";
              $false = "";
            }

            if($row['camp']){
              $afmelden = "<option value=''>Afmelden</option>";
            }else{$afmelden = "";}
            echo "<input class='form-control' type='hidden' name='id' value='" . $row['id'] . "' required/>";
            echo "Discipline: <input class='form-control' type='text' name='ticket' value='" . $row['ticket'] . "'required/>";
            echo "Naam: <input class='form-control' type='text' name='name' value='" . $row['name'] . "'/>";
            echo "Straat + huisnummer: <input class='form-control' type='text' name='adress' value='" . $row['adress'] . "'required/>";
            echo "Postcode + plaats: <input class='form-control' type='text' name='postal' value='" . $row['postal'] . "'required/>";
            echo "Geboortedatum: <input class='form-control' type='date' name='birthday' value='" . $row['birthday'] . "'required/>";
            echo "Geboorteplaats: <input class='form-control' type='text' name='birthplace' value='" . $row['birthplace'] . "'required/>";
            echo "Foto: <select class='form-control' name='picture' required><option value='1' ". $true .">ja, dit mag</option><option value='0' ". $false .">nee, liever niet</option></select>";
            echo "Bijzonderheden: <input class='form-control' type='text' name='notes' value='" . $row['notes'] . "'/>";
            echo "Cwo: <input class='form-control' type='text' name='cwo' value='" . $row['cwo'] . "'/>";
            echo "Welk kamp?<select id='camp' class='form-control' name='camp' onchange='checkValue()'><option value='kinderkamp'>Kinderkamp</option><option value='11/13'>11/13</option><option value='14/19' selected>14/19</option>".$afmelden."</select>";
            echo "<p id='phone' style='display: none;'>Telefoonnummer ouder/verzorger: <input class='form-control' type='number' name='phone'></p>";
          }
          mysqli_close($conn);
        }
        ?>
           <!-- The Modal -->
  <div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Aanmelden bevestigen?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Weet u zeker dat alle gegevens kloppen?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
          <button class="btn btn-success" type="submit" class="btn btn-secondary">Ja</button>
        </div>
        
      </div>
    </div>
  </div>
    </form>
     <button style="margin-top: 1%;" class="btn btn-danger float-left" data-toggle="modal" data-target="#cancel">Annuleren</button>
     <button style="margin-top: 1%;" class="btn btn-success float-right" data-toggle="modal" data-target="#add">Bevestigen</button>
    </div>
  </div>
   <!-- The Modal -->
  <div class="modal fade" id="cancel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Weet je zeker dat je wilt annuleren?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Als je op <strong>JA</strong> klikt dan gaan alle wijzigingen verloren!
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
          <button class="btn btn-success" type="button" class="btn btn-secondary" onclick="location.href='home.php?pw=-2084051690'">Ja</button>
        </div>
        
      </div>
    </div>
  </div>


</body>
<script type="text/javascript">
  function checkValue(){
    if(document.getElementById('camp').value == "kinderkamp"){
      document.getElementById('phone').style.display = "block";
    }
    else{
      document.getElementById('phone').style.display = "none";
    }
  }
</script>
</html>

