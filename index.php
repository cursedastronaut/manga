<?php
if (is_null($_GET["folder"])) {
	$files1 = scandir("content");
	foreach ($files1 as $key => $sub) {
		if ($sub == '.') continue;
		echo "<a href='index.php?folder=" . "content/" . $sub . "'>" . $sub . "</a><br/>";
	}
} else {

	$dir = $_GET["folder"];
	$files1 = scandir($dir);
	// Remove '.' and '..' from the array
	$files1 = array_diff($files1, array('.', '..'));

	// Sort files in natural order
	natsort($files1);
	foreach ($files1 as $key => $img) {
		if ($img == '.' || $img == '..') continue;
	
		// Check if the item is a directory
		if (is_dir($dir . "/" . $img)) {
			echo "<a href='index.php?folder=" . $dir . "/" . $img . "'>" . $img . "</a><br/>";
		} else {
			$img = str_replace("'", "&#x27;", $img);
			$img = str_replace("\"", '&#x22;', $img);
			echo "<img src='" . $dir . "/". $img . "'/><br>";
		}
	}
}
?>

<style>
	body {
		text-align: center;
	}
</style>