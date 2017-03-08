<?php
	Class SaveImage
	{
		public function extensions()
		{
			$extensions	= array("jpeg","jpg","png");
			return $extensions;
		}

		public function save()
		{
			$file_name 	= $_FILES['image']['name'];
			$file_size 	= $_FILES['image']['size'];
			$file_tmp 	= $_FILES['image']['tmp_name'];
			$file_ext	= strtolower(end(explode('.',$_FILES['image']['name'])));
			$filename 	= strtotime('now').'_'.$file_name;
			$error 		= '';
			
			if(in_array($file_ext, $this->extensions())=== false){
				$error="extension not allowed, please choose a JPEG or PNG file.";
			}

			if($file_size > 1024000){
				if ($error) {
					$error=$error.' and File size must be excately 1 MB';
				} else {
					$error='File size must be excately 1 MB';
				}
			}

			if(empty($error)==true){
				move_uploaded_file($file_tmp,"images/".$filename);
				$response['status']  = 'Success';
				$response['results'] = $filename;
				return $response;
			}else{
				$response['status']  = 'Error';
				$response['results'] = $error;
				return $response;
			}
		}
	}

	if(isset($_FILES['image'])){
		$save_image = new SaveImage;
		$save = $save_image->save();
		foreach ($save as $key => $value) {
			echo $key.': '.$value.'<br>';
		}
		?><br><a href="/test/test-upload_image">Back</a><?php
   	}
?>