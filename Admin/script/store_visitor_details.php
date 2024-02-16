<?php
// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

// Establish a database connection
 $conn = mysqli_connect("sql107.epizy.com","epiz_33388056","aMNJUY2HyQM7A7J","epiz_33388056_cpcdiagnostic");
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Get the visitor details sent from the JavaScript code
$ip = $_POST['ip'];
$city = $_POST['city'];
$region = $_POST['region'];
$country = $_POST['country'];
$postalCode = $_POST['postal_code'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$countryCode = $_POST['country_code'];
$currency = $_POST['currency'];
$timezone = $_POST['timezone'];
$networkProvider = $_POST['network_provider'];
date_default_timezone_set('Asia/Kolkata');
$dateTime = date('Y-m-d H:i:s');
		
		// Get the user agent string
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		
		// Define an array of common device names and their corresponding user agent strings
		$deviceNames = array(
		'iPhone' => 'iPhone',
		'iPad' => 'iPad',
		'Android' => 'Android',
		'Windows' => 'Windows',
		'Mac' => 'Macintosh',
		'Linux' => 'Linux'
		);
		
		// Initialize the device name variable
		$deviceName = 'Unknown';
		
		// Iterate through the device names array and check if the user agent string contains any of the known device names
		foreach ($deviceNames as $name => $userAgentString) {
		if (strpos($userAgent, $userAgentString) !== false) {
		$deviceName = $name;
		break;
		}
		}


// Prepare the SQL statement
$query = "INSERT INTO visitor_details (ip, city, region, country, postal_code, latitude, longitude, country_code, currency, timezone, network_provider, device_type, date) 
          VALUES ('$ip', '$city', '$region', '$country', '$postalCode', '$latitude', '$longitude', '$countryCode', '$currency', '$timezone', '$networkProvider', '$deviceName', '$dateTime')";

// Execute the SQL statement
if (mysqli_query($conn, $query)) {    
    echo "Visitor details stored successfully.";
} else {
    echo "Error storing visitor details: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>