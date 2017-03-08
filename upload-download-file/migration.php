<?php
//untuk menjalankan tinggal masuk ke path project dan ketikkan pada terminal atau cmd:
//php migration.php

	//pastikan pengaturan connection.php sudah benar
	include_once('connection.php');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	// sql to create table
	$sql = "CREATE TABLE upload_and_download_file (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		name VARCHAR(30) NOT NULL,
		created_at TIMESTAMP
	)";

	if ($conn->query($sql) === TRUE) {
    	echo "Table UploadAndDownloadFile created successfully";
	} else {
    	echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>