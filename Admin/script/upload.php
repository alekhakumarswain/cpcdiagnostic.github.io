<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $allowedExtensions = ['png'];
  $uploadDir = ''; // Leave it empty to upload to the same folder as the PHP script
  $newFileName = 'flex.png';

  $uploadFile = $uploadDir . basename($_FILES['imageUpload']['name']);
  $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

  if (in_array($imageFileType, $allowedExtensions)) {
    if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $uploadFile)) {
      // Rename the previous file
      $previousFile = $uploadDir . $newFileName;
      if (file_exists($previousFile)) {
        $newName = 'flex' . date('YmdHis') . '.png';
        rename($previousFile, $uploadDir . $newName);
      }

      // Rename the uploaded file to flex.png
      rename($uploadFile, $previousFile);

      echo 'Image uploaded successfully.';
    } else {
      echo 'Failed to upload the image.';
    }
  } else {
    echo 'Only PNG files are allowed.';
  }
}
?>
