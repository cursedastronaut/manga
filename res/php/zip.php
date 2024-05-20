<?php

function createZipFromDir($dirPath, $zipFilePath) {
	$zip = new ZipArchive();
	if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
		exit("Cannot open <$zipFilePath>\n");
	}

	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($dirPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file) {
		// Skip directories (they would be added automatically)
		if (!$file->isDir()) {
			// Get real path for current file
			$filePath = $file->getRealPath();
			// Get relative path for the file
			$relativePath = substr($filePath, strlen($dirPath) + 1);

			// Add current file to archive
			$zip->addFile($filePath);
		}
	}

	// Zip archive will be created only after closing object
	$zip->close();
}

function redirectToZip($zipFilePath) {
	if (file_exists($zipFilePath)) {
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename="' . basename($zipFilePath) . '"');
		header('Content-Length: ' . filesize($zipFilePath));
		flush();
		readfile($zipFilePath);
		// Remove the ZIP file if you don't need to keep it on the server
		unlink($zipFilePath);
		exit;
	} else {
		exit("The zip file does not exist.");
	}
}


?>
