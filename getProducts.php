<?php
// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

// Establish a database connection
$conn = mysqli_connect("sql107.epizy.com","epiz_33388056","aMNJUY2HyQM7A7J","epiz_33388056_cpcdiagnostic");
    
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Fetch additional products from the database
$query = "SELECT * FROM products ORDER BY TestName ASC "; // Fetch 20 products ordered by TestName
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Generate the HTML table
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Test Name</th>";
    echo "<th>Price</th>";
    echo "<th>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['TestName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td><a href='https://docs.google.com/forms/d/e/1FAIpQLSeQ_dxrc3o0NkPPMppVoGHU4Vzg0Ecum3eiMoSJi9rXC-Se2g/viewform' class='btn btn-primary'>Book Now</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    // Check if there are more products
   /* $query_count = "SELECT COUNT(*) as count FROM products";
    $count_result = mysqli_query($conn, $query_count);
    $total_count = mysqli_fetch_assoc($count_result)['count'];

    if ($total_count > 20) {
        echo "<div class='col-md-12 text-center'>";
        echo "<button id='showMoreBtn' class='btn btn-secondary mt-4'>More</button>";
        echo "</div>";
    }*/
} else {
    echo "No products found.";
}

// Close the database connection
mysqli_close($conn);
?>
