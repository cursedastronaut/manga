<head>
	<title>Manga - Terres Spatiales</title>
	<link href="res/css/index.css" rel="stylesheet" />
</head>
<body>
	<?php
	if (is_null($_GET["folder"])) {
		include("res/php/root.php");
	} else {
		include("res/php/subfolder.php");
	}
	?>
</body>