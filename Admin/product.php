<html>
<head>
<title>
	Update Products Details
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<style type="text/css">
	<style>
	.table {
	border-collapse: collapse;
	width: 100%;
	}
	
	.table th, .table td {
	border: 1px solid #ddd;
	padding: 8px;
	}
	
	.table th {
	background-color: #f2f2f2;
	}
	
	.table td input[type="text"] {
	padding: 4px;
	}
	
	.table td button {
	margin-right: 4px;
	}
	
	.success-message {
	color: green;
	}
	
	.error-message {
	color: red;
	}
	</style>
	
</style>
</head>
<body>
<?php
// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

// Establish a database connection
   include("auth_session.php");
   include("db.php");
// Check if the form is submitted for update or delete
if (isset($_POST['submit'])) {
    $itemId = $_POST['item_id'];
    $action = $_POST['action'];
    
    if ($action == 'update') {
        $newPrice = $_POST['new_price'];
        
        // Update the item in the database
        $query = "UPDATE products SET Price = '$newPrice' WHERE id = '$itemId'";
        
        if (mysqli_query($conn, $query)) {
            echo "Item updated successfully.";
        } else {
            echo "Error updating item: " . mysqli_error($conn);
        }
    } elseif ($action == 'delete') {
        // Delete the item from the database
        $query = "DELETE FROM products WHERE id = '$itemId'";
        
        if (mysqli_query($conn, $query)) {
            echo "Item deleted successfully.";
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    }
}

// Fetch all items from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Generate the HTML table
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Item Name</th>";
    echo "<th>Price</th>";
    echo "<th>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['TestName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='item_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='update'>";
        echo "<input type='text' name='new_price' placeholder='New Price'>";
        echo "<button type='submit' name='submit' class='btn btn-primary'>Update</button>";
        echo "</form>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='item_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='delete'>";
        echo "<button type='submit' name='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No items found.";
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>