<?php
	require_once '__DIR__/../lib/config.php';
	require_once '__DIR__/../lib/function.php';


	$files = getAllFiles(MY_DIR);
	if($files != false) {
?>

<table>
    <tr>
	<th> # </th>
	<th> File Name </th>
	<th> Size, kb </th>
	<th> Command </th>
    </tr>
<?php
	$id = 1; 
	foreach($files as $file) {
?>
	<tr>
		<td><?=$id?></td>
		<td><?=$file['name']?></td>
		<td><?=checkSize($file['size']) ?></td>
		<td><a href="index.php?name=<?=$file['name']?>">DELETE</a></td>
	<tr>
<?php
	$id++;
}
?>

</table>
<?php
	}
?>







