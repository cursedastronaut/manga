<?php
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
			echo "<img class='page' src='" . $dir . "/". $img . "'/><br>";
		}
	}
?>

<button onclick="location.href='index.php?download=<?php echo $dir; ?>'">Download all images as a ZIP</button>