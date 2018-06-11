<?php

require_once 'config.php';

function uploadFiles($arr, $dir) {
	if(is_writable($dir)) {
		$array_files = [];
		foreach($arr as $key => $error) {
			$tmp_name = $arr[TMP_NAME];
			$name = basename($arr[NAME]);
			$size = $arr[SIZE];
			if(move_uploaded_file($tmp_name, $dir . '/' . $name)) {
				echo "File added";
				return chmod($dir . '/' . $name, 0777);
			} else {
				echo "Can not add file. Try later";
			}
		}
	} else {
		echo "You do not have sufficient permissions to add a file";
		return false;
	}

}


function getAllFiles($dir) {
	if(is_writable($dir)) {
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
	} else {
		echo "You do not have sufficient permissions for preview files";
		return false;
	}
}

function deleteFile($dir, $name) {
	$file = $dir.'/'.$name;
	if(file_exists($file)) {
		if(unlink($file)) {
			echo "File DELETED";
			return true;
		} else {
			echo "Cannot DELETE the file";
			return false;
		}
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












