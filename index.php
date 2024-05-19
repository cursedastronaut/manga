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
	foreach ($files1 as $key => $img) {
		if ($img == '.' || $img == '..') continue;
	
		// Check if the item is a directory
		if (is_dir($dir . "/" . $img)) {
			echo "<a href='index.php?folder=" . $dir . "/" . $img . "'>" . $img . "</a><br/>";
		} else {
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