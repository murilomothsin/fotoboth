<?php

// Define a destination
$targetFolder = 'temp'; // Relative to the root

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/'.$_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$fileParts['extension'] = strtolower($fileParts['extension']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		echo (move_uploaded_file($tempFile,$targetFile));
	} else {
		echo 'Invalid file type.';
	}
}
?>