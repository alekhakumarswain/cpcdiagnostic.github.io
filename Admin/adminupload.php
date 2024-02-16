<?php
include("auth_session.php");
$uploadDirectory = '../Img/Office/'; // Directory where the image is uploaded

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // Action to perform (rename or delete)
    $fileName = $_POST['file']; // Name of the uploaded file

    if ($action === 'rename') {
        $newFileName = $_POST['new_name']; // New name for the file

        // Rename the image file
        $filePath = $uploadDirectory . $fileName;
        $newFilePath = $uploadDirectory . $newFileName;

        if (file_exists($filePath)) {
            if (rename($filePath, $newFilePath)) {
                echo 'File renamed successfully';
            } else {
                echo 'Failed to rename the file';
            }
        } else {
            echo 'File not found';
        }
    } elseif ($action === 'delete') {
        // Delete the image file
        $filePath = $uploadDirectory . $fileName;
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                echo 'File deleted successfully';
            } else {
                echo 'Failed to delete the file';
            }
        } else {
            echo 'File not found';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style type="text/css">
    	/* Styles for the admin panel */
    	
    	h1 {
    	color: #333;
    	}
    	
    	h2 {
    	color: #666;
    	}
    	
    	form {
    	margin-bottom: 20px;
    	}
    	
    	select, input[type="text"], textarea {
    	display: block;
    	margin-bottom: 10px;
    	}
    	
    	input[type="submit"] {
    	background-color: #007bff;
    	color: #fff;
    	border: none;
    	padding: 10px 20px;
    	cursor: pointer;
    	}
    	
    	input[type="submit"]:hover {
    	background-color: #0056b3;
    	}
    	
    	/* Additional styles and layout adjustments can be added as per your requirements */
    	
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Rename File</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="rename">
        <select name="file">
            <?php
            // Get a list of uploaded image files
            $files = scandir($uploadDirectory);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo '<option value="' . $file . '">' . $file . '</option>';
                }
            }
            ?>
        </select>
        <input type="text" name="new_name" placeholder="New File Name">
        <input type="submit" value="Rename">
    </form>

    <h2>Delete File</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="delete">
        <select name="file">
            <?php
            // Get a list of uploaded image files
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo '<option value="' . $file . '">' . $file . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
