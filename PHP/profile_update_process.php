<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $user_id = $_POST["user_id"];
    $updated_email = $_POST["updated_email"];
    $updated_phone = $_POST["updated_phone"];

    // Assuming you have a database connection
    $conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update user data in the database (this is a basic example)
    $sql = "UPDATE users SET email='$updated_email', phone='$updated_phone' WHERE id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        // Profile update successful
        header("Location: profile_updated.html"); // Redirect to a success page
        exit();
    } else {
        // Profile update failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
