<?php
	$fname=$_GET["filename"];
	
	$file=fopen('../data/'.$fname, "rb");
	
	header("Content-Type: application/octet-stream");
	
	header("content-Disposition: attachment; filename=".$fname);
	
	fpassthru($file);
	
	fclose($file);
?>