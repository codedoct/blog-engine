<?php    
    //mongo connection
    try
	{
		$connection = new MongoDB();
	}
	catch(MongoConncetionException $e)
	{
		die("Koneksi Gagal. cek untuk memastikan MongoDB nya jalan");
	}

    $db= $connection->selectDB('crud_mongodb');
    if (!$db) {
    	echo "error db";
    }
    //collection Blogdb
    $crud = $connection->crud_mongodb->news;
?>