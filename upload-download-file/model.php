<?php
	class FileController 
	{
		public function saveFile($name)
		{
			include 'connection.php';
			$sql="INSERT INTO upload_and_download_file (name,created_at) VALUES ";
		    $sql.="('$name',NOW())";
		 	$save = mysql_query($sql,$db);

			if ($save) {
		    	return true;
			} else {
		    	echo "Error";
			}	
		}
	}
?>