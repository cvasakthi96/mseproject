<?php



$filename =$_GET["action"];

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=".$filename);
readfile("doc/".$filename);


?>