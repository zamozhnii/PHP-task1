<?php
	require_once '__DIR__/../lib/function.php';
	require_once '__DIR__/../lib/config.php';
?>


<form enctype="multipart/form-data" action="<?='index.php'?>" method="POST">
	<input type="file" name="file_upl">
	<input type="submit" name="submit_btn">
</form>

<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		uploadFiles($_FILES["file_upl"], MY_DIR);
	}
?>




