<?php
	require_once 'lib/config.php';
	require_once 'lib/function.php';
	require_once 'templates/index-tmpl.php';

	if($files){
		if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
			$file_name = trim($_GET['name']);
			deleteFile(MY_DIR, $file_name);
		}
	}
?>	


