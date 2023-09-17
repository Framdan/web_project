<?php
// Connect to your database (replace with your database connection code)
$conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the properties table to retrieve listings
$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Loop through the result set and display property listings
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='property-listing'>";
        echo "<h2>{$row['title']}</h2>";
        echo "<p>Price: {$row['price']}</p>";
        echo "<p>Location: {$row['location']}</p>";
        echo "<img src='{$row['image_url']}' alt='Property Image'>";
        echo "<p>{$row['description']}</p>";
        echo "</div>";
    }

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
