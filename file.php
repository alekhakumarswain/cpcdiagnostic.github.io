<?php
$directory = '/Img'; // Replace with the path to your directory
$zipFilename = 'archive.zip'; // Specify the name of the zip file

// Create a new ZipArchive instance
$zip = new ZipArchive();

// Open the zip file for writing
if ($zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

    // Create recursive directory iterator
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // Skip directories
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($directory) + 1);

            // Add file to the zip archive with its relative path
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Close the zip archive
    $zip->close();

    // Set headers to force download the zip file
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zipFilename . '"');
    header('Content-Length: ' . filesize($zipFilename));
    header('Pragma: no-cache');
    readfile($zipFilename);

    // Delete the zip file after download
    unlink($zipFilename);

    exit;
} else {
    echo 'Failed to create the zip archive.';
}
?>