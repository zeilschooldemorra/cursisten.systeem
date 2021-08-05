<?php
	include ('config.php');

 	$id = $_POST['id'];
  $camp = $_POST['camp'];
  $name = $_POST['name'];

  	if (!$conn) {
   		die('Could not connect: ' . mysqli_error($conn));
  	}

  	$sql = "DELETE FROM wallstaf WHERE curs_id = '$id'";
  	

  if ($conn->query($sql) === TRUE) {
      header('Location: http://localhost/morra_systeem/wallstaf.php?pw=206586613&camp='.$camp.'&delete='.$name);
  } else{
      header('Location: http://localhost/morra_systeem/wallstaf.php?pw=206586613&camp='.$camp.'&!delete='. $name);
	}

  	mysqli_close($conn);

?>