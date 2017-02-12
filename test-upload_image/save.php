<?php
	if(isset($_FILES['image'])){
		$errors		= array();
		$file_name 	= $_FILES['image']['name'];
		$file_size 	= $_FILES['image']['size'];
		$file_tmp 	= $_FILES['image']['tmp_name'];
		$file_ext	= strtolower(end(explode('.',$_FILES['image']['name'])));

		$extensions	= array("jpeg","jpg","png");

		if(in_array($file_ext,$extensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}

		if($file_size > 1024000){
			$errors[]='File size must be excately 1 MB';
		}

		if(empty($errors)==true){
			$filename = strtotime('now').'_'.$file_name;
			move_uploaded_file($file_tmp,"images/".$filename);
			echo "Success";
			?><br><a href="/test/test-upload_image">Back</a><?php
		}else{
			print_r($errors);
			?><br><a href="/test/test-upload_image">Back</a><?php
		}
   	}
?>