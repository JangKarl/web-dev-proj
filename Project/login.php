<?php
	$username = $_POST['username'];
	$password = $_POST['password'];


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(username, password) 
		values(?, ?)");
		$stmt->bind_param("ss", $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Login successfully...";
		$stmt->close();
		$conn->close();
	}
?>