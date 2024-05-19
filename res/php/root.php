
<?php
echo "<div class='flex-row'>";
$files1 = scandir("content");
foreach ($files1 as $key => $sub) {
	if ($sub == '.' || $sub == '..' || str_contains($sub, "preview-")) continue;
	
	echo "<a href='index.php?folder=" . "content/" . $sub . "' class='preview'>";
	if (file_exists("content/.preview-" . $sub . ".jpg"))
		echo "<img src='content/.preview-" . $sub . ".jpg'/>";
	echo $sub . "</a>";
}
echo "</div>";
?>