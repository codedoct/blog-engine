<?php
	include_once('uploadController.php');
?>
<head>
	<title>Hello | Budy</title>
</head>
<body>
	<div class="show-file">
		<ul>
			<?php
			 	$sql="SELECT * FROM upload_and_download_file";
			 	$hsl=mysql_query($sql,$db);
			 	$no=0;
			 	while(list($id,$name,$created_at)=mysql_fetch_array($hsl)){
			  		$no++;?>
						<li><?=$no?></li>
				  		<ul>
							<li><?=$name?></li>
							<li><?=$created_at?></li>
							<li><a href="downloadController.php?file_name=<?=$name?>">Download</a></li>
						</ul>
				<?php }
			?>
		</ul>
	</div>
	<div class="upload-file">
		<form action="uploadController.php" method="post" enctype="multipart/form-data">
			<input type="file" name="uploadFile">
			<input type="submit" value="Upload" name="upload">
		</form>
	</div>
</body>