<?php

require_once 'config.php';

function uploadFiles($arr, $dir) {
	$array_files = [];
	foreach($arr as $key => $error) {
		$tmp_name = $arr[TMP_NAME];
		$name = basename($arr[NAME]);
		$size = $arr[SIZE];
		move_uploaded_file($tmp_name, $dir . '/' . $name);
		return chmod($dir . '/' . $name, 0777);
	}
}


function getAllFiles($dir) {
	$result = [];
	$files = scandir($dir);
	$id = 0;
	foreach($files as $file) {
		if(!in_array($file, ['.', '..']) && !is_dir($dir . DIRECTORY_SEPARATOR . $file)) {
				
			$result[$id]['name'] = $file;
			$result[$id]['size'] = filesize($dir . DIRECTORY_SEPARATOR . $file);
			$id++;
		}
	}
	return $result;
}

function deleteFile($dir, $name) {
	if(file_exists($dir . '/' . $name)) {
		unlink($dir . '/' . $name);
	} else {
		return false;
	}
}

function checkSize($size) {
	if($size > 1000) {
		return $size/1000 . 'kB';
	} else {
		return $size . 'B';
	}
}












