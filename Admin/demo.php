<?php
// Get the current admin's name (replace with your logic to retrieve the admin name)
$adminName = 'username';

// Log the admin action
$action = "login"; // Replace with the actual action performed on the page
$data = array(
    'admin_name' => $adminName,
    'action' => $action
);

// Send the admin action details to write.php using a POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'write.php'); // Replace with the correct path to write.php
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Check the response from write.php
if ($response === false) {
    echo 'Failed to log admin action.';
} else {
    echo 'Admin action logged successfully.';
}
?>