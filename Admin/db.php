<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $conn = mysqli_connect("sql107.epizy.com","epiz_33388056","aMNJUY2HyQM7A7J","epiz_33388056_cpcdiagnostic");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>