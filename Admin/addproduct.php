<!DOCTYPE html>
<html>
<head>
    <title>Add and Update Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Assuming you have a database connection established
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

    // Establish a database connection
    include("auth_session.php");
	include("db.php");
    // Check if the form is submitted for adding a new product
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
        // Retrieve the form data
        $productId = $_POST['productId'];
        $productName = $_POST['TestName'];
        $productPrice = $_POST['productPrice'];

        // Prepare the SQL statement to insert the product into the database
        $query = "INSERT INTO products (id, TestName, Price) VALUES ('$productId', '$productName', '$productPrice')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            $message = "Product added successfully.";
            $messageClass = "success";
        } else {
            $message = "Error adding product: " . mysqli_error($conn);
            $messageClass = "error";
        }
    }

    // Check if the form is submitted for updating a product
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProduct'])) {
        // Retrieve the form data
        $productId = $_POST['updateProductId'];
        $newPrice = $_POST['newPrice'];

        // Prepare the SQL statement to update the product price
        $query = "UPDATE products SET Price = '$newPrice' WHERE id= '$productId'";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            $message = "Product updated successfully.";
            $messageClass = "success";
        } else {
            $message = "Error updating product: " . mysqli_error($conn);
            $messageClass = "error";
        }
    }

    // Fetch all products from the database
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    ?>
    
    <h1>Add and Update Products</h1>

    <form method="POST" action="">
        <h2>Add Product</h2>
        <label for="productId">Product ID:</label>
        <input type="text" name="productId" id="productId" required>
        <label for="productName">Test Name:</label>
        <input type="text" name="TestName" id="productName" required>
        <label for="productPrice">Price:</label>
        <input type="text" name="productPrice" id="productPrice" required>
        <input type="submit" name="addProduct" value="Add Product">
    </form>

    <form method="POST" action="">
        <h2>Update Product</h2>
        <label for="updateProductId">Product ID:</label>
        <input type="text" name="updateProductId" id="updateProductId" required>
        <label for="newPrice">New Price:</label>
        <input type="text" name="newPrice" id="newPrice" required>
        <input type="submit" name="updateProduct" value="Update Product">
    </form>

    <h2>Products List</h2>

    <?php
    // Display success or error message, if any
    if (isset($message)) {
        echo "<p class=\"$messageClass\">$message</p>";
    }

    // Check if there are any products
    if (mysqli_num_rows($result) > 0) {
        // Generate the HTML table
        echo "<table>";
        echo "<tr>";
        echo "<th>Product ID</th>";
        echo "<th>Test Name</th>";
        echo "<th>Price</th>";
        echo "<th>Actions</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['TestName'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>";
            echo "<a href=\"product.php?id=" . $row['ProductID'] . "\">Edit</a> | ";
            echo "<a href=\"product.php?id=" . $row['ProductID'] . "\" onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>