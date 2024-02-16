/*<?php
// Get the admin action details from the request
$adminName = $_POST['admin_name'];
$action = $_POST['action'];

// Log admin actions
$logFile = 'Admin.txt';
$timestamp = date('Y-m-d H:i:s');
$logMessage = "Admin: " . $adminName . "\t\t";
$logMessage .= "Date and Time: " . $timestamp . "\t\t";
$logMessage .= "Action: " . $action . "\n\n";

// Append the log message to the log file
file_put_contents($logFile, $logMessage, FILE_APPEND);
?>*/

<?php
// Retrieve the action details from the request
$name = $_POST['name'];
$action = $_POST['action'];

// Prepare the log message
$logMessage = "Admin Name: $name" . PHP_EOL;
$logMessage .= "Time and Date: " . date("Y-m-d H:i:s") . PHP_EOL;
$logMessage .= "Action: $action" . PHP_EOL . PHP_EOL;

// Append the log message to the file
file_put_contents('Admin.txt', $logMessage, FILE_APPEND);
?>
