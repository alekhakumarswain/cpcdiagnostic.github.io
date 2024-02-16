<?php
include("auth_session.php");
$uploadDirectory = '../Img/Office/'; // Directory where the image will be uploaded

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadedFile = $_FILES['image']; // The uploaded file from the HTML form

    // Check if the file was uploaded successfully
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $tempFilePath = $uploadedFile['tmp_name']; // Temporary file path

        // Generate a unique filename for the uploaded image
        $fileName = uniqid() . '_' . $uploadedFile['name'];

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($tempFilePath, $uploadDirectory . $fileName)) {
            echo 'File uploaded successfully';
        } else {
            echo 'Failed to move the uploaded file';
        }
    } else {
        echo 'Error uploading file: ' . $uploadedFile['error'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h1>Image Upload</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload">
    </form>
</body>
</html>