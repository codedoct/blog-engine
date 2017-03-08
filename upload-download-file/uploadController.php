<?php
	include_once('connection.php');
	include_once('model.php');

	if (isset($_POST['upload'])) {
		$errors		= array();
		$file_name 	= $_FILES['uploadFile']['name'];
		$file_size 	= $_FILES['uploadFile']['size'];
		$file_tmp 	= $_FILES['uploadFile']['tmp_name'];
		$file_ext	= strtolower(end(explode('.',$_FILES['uploadFile']['name'])));

		$extensions	= array("txt");

		if(in_array($file_ext,$extensions)===false){
			$errors[]="extension not allowed, please choose a TXT file.";
		}

		if($file_size > 1024000){
			$errors[]='File size must be excately 1 MB';
		}

		if(empty($errors)==true){
			//save file to folder file
			$filename = strtotime('now').'_'.$file_name;
			move_uploaded_file($file_tmp,"file/".$filename);

			//save file to database
			$model = new FileController;
			$save_file = $model->saveFile($filename);
			if ($save_file) {
				//back to project
				$path_project = "http://localhost/test/test-upload-download-file/";
				header("Location: $path_project");
			}
		}else{
			print_r($errors);
			?><br><a href="/test/test-upload-download-file">Back</a><?php
		}
	}
?>