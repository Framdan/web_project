<?php
session_start(); // Start the session to access the landlord's ID

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $image_url = $_POST["image_url"];
    $landlord_id = $_SESSION["user_id"]; // Assuming you have stored the landlord's ID in the session

    // Connect to your database (replace with your database connection code)
    $conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert property data into the 'properties' table
    $sql = "INSERT INTO properties (title, description, price, location, image_url, landlord_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssdssi", $title, $description, $price, $location, $image_url, $landlord_id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: property_listing_success.html"); // Redirect to a success page
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
