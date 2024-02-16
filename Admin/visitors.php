<html>
<head>
	<title>VISITORS DETAILS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<style type="text/css">
		/* CSS for Visitor Details Table */
		table {
		width: 100%;
		border-collapse: collapse;
		}
		
		table th, table td {
		padding: 8px;
		border: 1px solid #ddd;
		}
		
		table th {
		background-color: #f2f2f2;
		font-weight: bold;
		}
		
		/* CSS for Visitor Count Table */
		table.visitor-count {
		width: 100%;
		border-collapse: collapse;
		}
		
		table.visitor-count th, table.visitor-count td {
		padding: 8px;
		border: 1px solid #ddd;
		}
		
		table.visitor-count th {
		background-color: #f2f2f2;
		font-weight: bold;
		}
		
	</style>
</head>
<body>
<?php
// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

// Establish a database connection
$conn = mysqli_connect("sql107.epizy.com","epiz_33388056","aMNJUY2HyQM7A7J","epiz_33388056_cpcdiagnostic");
    
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Retrieve the visitor details from the database
$query = "SELECT * FROM visitor_details ORDER BY date DESC, date DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    // Count the number of visitors for each date
    $visitorCountByDate = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['date'];
        if (isset($visitorCountByDate[$date])) {
            $visitorCountByDate[$date]++;
        } else {
            $visitorCountByDate[$date] = 1;
        }
    }

    // Display the visitor details to the admin
    echo '<h2>Visitor Details</h2>';
    echo '<table>';
    echo '<tr><th>Date</th><th>Time</th><th>IP</th><th>City</th><th>Region</th><th>Country</th><th>Postal Code</th><th>Latitude</th><th>Longitude</th><th>Device Name</th></tr>';

    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        $dateTime = $row['date']; // Assuming the column name in the database is 'datetime'
        $date = date('Y-m-d', strtotime($dateTime));
        $time = date('H:i:s', strtotime($dateTime));
        $ip = $row['ip'];
        $city = $row['city'];
        $region = $row['region'];
        $country = $row['country'];
        $postalCode = $row['postal_code'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $deviceName = $row['device_type'];

        echo '<tr>';
        echo '<td>' . $dateTime. '</td>';
        echo '<td>' . $time . '</td>';
        echo '<td>' . $ip . '</td>';
        echo '<td>' . $city . '</td>';
        echo '<td>' . $region . '</td>';
        echo '<td>' . $country . '</td>';
        echo '<td>' . $postalCode . '</td>';
        echo '<td>' . $latitude . '</td>';
        echo '<td>' . $longitude . '</td>';
        echo '<td>' . $deviceName . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // Display the visitor count by date
    echo '<h2>Visitor Count by Date</h2>';
    echo '<table>';
    echo '<tr><th>Date</th><th>Visitor Count</th></tr>';

    foreach ($visitorCountByDate as $date => $count) {
        echo '<tr>';
        echo '<td>' . $date . '</td>';
        echo '<td>' . $count . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Error retrieving visitor details: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>