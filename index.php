<head>
	<title>Manga - Terres Spatiales</title>
	<link href="res/css/index.css" rel="stylesheet" />
</head>
<body>
	<?php

	if (!file_exists('content')) {
		mkdir('content', 0777, true);
	}

	if (is_null($_GET["folder"]) && is_null($_GET["download"])) {
		include("res/php/root.php");
	} else if (is_null($_GET["download"])) {
		include("res/php/subfolder.php");
	} else {
		include("res/php/zip.php");

		$zipFile = $_GET["download"];
		$zipFile = str_replace("\\", "-", $zipFile);
		$zipFile = str_replace("/", "-", $zipFile);
		$zipFile = str_replace("\"", "-", $zipFile);
		$zipFile = str_replace("'", "-", $zipFile);
		$zipFile = str_replace(" ", "_", $zipFile);
		$zipFile = str_replace(" ", "_", $zipFile);

		createZipFromDir($_GET["download"], "zip/" . $zipFile . ".zip");
		redirectToZip("zip/" . $zipFile . ".zip");
	}
	?>
</body>