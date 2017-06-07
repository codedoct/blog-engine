<?php
include('koneksi.php');
$listnews= $db->news->find(); ?>
<?php
	if (!$listnews) {
		echo "error";
	}
	foreach ($listnews as $key => $value) {
		echo $value['title'];
	}
?>
<!-- <table border="1">
	<tr>
 		<th>Title</td>
 		<th>Description</th>
 	</tr>
	<?php foreach($listnews as $value){ ?>         
     	<tr>
     		<td><?=$value['title']?></td>
     		<td><?=$value['description']?></td>
     	</tr>
	<?php } ?>
</table> -->