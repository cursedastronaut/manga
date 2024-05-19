<?php
if (is_null($_GET["folder"])) {
	echo "<div class='flex-row'>";
	$files1 = scandir("content");
	foreach ($files1 as $key => $sub) {
		if ($sub == '.' || $sub == '..' || str_contains($sub, "preview-")) continue;
		$previewExists = file_exists("content/.preview-" . $sub . ".jpg");
		if ($previewExists)
			echo "<div class='preview'><img src='content/.preview-" . $sub . ".jpg'/>";
		echo "<a href='index.php?folder=" . "content/" . $sub . "'>" . $sub . "</a>";
		if ($previewExists)
			echo "</div>";
		else
			echo "<br/>";
	}
	echo "</div>";
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
			echo "<img class='page' src='" . $dir . "/". $img . "'/><br>";
		}
	}
}
?>

<style>
	.flex-row {
		text-align: center;
		display: flex;
		flex-flow: row;
	}

	.page {
		max-width: 100%;
	}

	.preview {
		max-height: 256px;
		max-width: calc(10% - 16px);
		display: flex;
		flex-flow: column;
	}
</style>