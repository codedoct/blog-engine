<?php
    $file_name = $_GET['file_name'];
    $file = "file/".$file_name;

    if(!file_exists($file)) die("I'm sorry, the file doesn't seem to exist.");

    header("Pragma: public", true);
    header("Expires: 0"); // set expiration time
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=".basename($file));
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($file));
    die(file_get_contents($file));
?>