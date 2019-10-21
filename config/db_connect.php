<?php

	$conn = mysqli_connect('localhost', 'matt','ShepHerdsP@ssw0rd', 'five_guys');
	
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

?>