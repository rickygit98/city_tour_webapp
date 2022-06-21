<?php

session_start();

require "database.php";

function registration($data){
	
	global $conn;

	$nama = $data["nama"];
	$email = $data["email"];
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	
	// cek email
	$check = "SELECT email FROM users WHERE email = '$email'";
	$res = mysqli_query($conn,$check);
	if(mysqli_fetch_row($res)){
		echo ("
             <script>
                 alert('Email sudah terdaftar');
             </script>
        ");
		return false;
	}

	// encrypt password
	$password = password_hash($password,PASSWORD_DEFAULT);

	// Insert to DB
	$query = "INSERT INTO users
		(nama,username,email,password) 
			VALUES 
		('$nama','$username','$email','$password')";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function login($data){

	global $conn;

	$email = $data["email"];
	$password = $data["password"];

	// email check
	$query = "SELECT * FROM users WHERE email = '$email'";

	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) === 1){
		// verify and unhash password , match
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password,$row["password"])){
            // Set Session
            $_SESSION = $row;

			header("Location:index.php");
			exit;
		}
	}

}

?>
