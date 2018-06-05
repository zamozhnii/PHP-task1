<?php
	require_once 'lib/config.php';
	require_once 'lib/function.php';
?>

<html>
<head>
<title><?=$title?></title>
</head>
<body>
<?php
	require_once 'templates/input_tmpl.php';
	require_once 'templates/table_tmpl.php';
	if($files){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$file_name = trim($_GET['name']);
			deleteFile(MY_DIR, $file_name);
		}
	}
?>	
</body>
</html>

