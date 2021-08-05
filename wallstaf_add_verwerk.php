<?php 

  include ('config.php');

  $camp = $_POST['camp'];
  $name = $_POST['name'];
  $id = $_POST['id'];
  $extra = $_POST['extra'];

    if (!$conn) {
      die('Could not connect: ' . mysqli_error($conn));
    }
  
    $sql = "INSERT INTO wallstaf (camp, curs_id, extra) VALUES ('$camp', '$id', '$extra')";

    if(mysqli_query($conn, $sql)){
      header('Location: http://localhost/morra_systeem/wallstaf.php?pw=206586613&camp='.$camp.'&message='.$name);
  } else{
      header('Location: http://localhost/morra_systeem/wallstaf.php?pw=206586613&camp='.$camp.'&error='. $name);
  }

    mysqli_close($conn);

 ?>