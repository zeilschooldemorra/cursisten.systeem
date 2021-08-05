<?php
	include ('config.php');

 	$camp = $_POST['camp'];
 	$id = $_POST['id'];
 	$ticket = $_POST['ticket'];
 	$name = $_POST['name'];
 	$adress = $_POST['adress'];
 	$postal = $_POST['postal'];
 	$birthday = $_POST['birthday'];
 	$birthplace = $_POST['birthplace'];
 	$picture = $_POST['picture'];
 	$notes = $_POST['notes'];
 	$cwo = $_POST['cwo'];
 	$phone = $_POST['phone'];

  	if (!$conn) {
   		die('Could not connect: ' . mysqli_error($conn));
  	}
  	if($camp == "kinderkamp"){
  		$sql = "UPDATE cursisten SET ticket='$ticket', name='$name', adress='$adress', postal='$postal', birthday='$birthday', birthplace='$birthplace', picture='$picture', notes='$notes', cwo='$cwo', phone='$phone', camp='$camp' WHERE id = '$id'";
  	}else{
  		$sql = "UPDATE cursisten SET ticket='$ticket', name='$name', adress='$adress', postal='$postal', birthday='$birthday', birthplace='$birthplace', picture='$picture', notes='$notes', cwo='$cwo', camp='$camp' WHERE id = '$id'";
  	}
  	

  	if(mysqli_query($conn, $sql)){
	    header('Location: http://localhost/morra_systeem/home.php?pw=-2084051690&message='.$name);
	} else{
	    header('Location: http://localhost/morra_systeem/home.php?pw=-2084051690&error='. $name);
	}

  	mysqli_close($conn);

?>