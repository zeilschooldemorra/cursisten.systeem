<?php
	$conn = mysqli_connect('127.0.0.1', 'morra', 'test1234', 'morra');

	if(!$conn)
	{
		echo 'Connection error ' . mysqli_connect_error();
	}
?>