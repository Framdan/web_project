<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $email = $_POST["email"];
    $password = $_POST["password"]; // Password should be hashed for security
    $confirm_password = $_POST["confirm_password"];
    $phone = $_POST["phone"];
    $user_role = $_POST["user_role"];

    // Perform validation (e.g., check if passwords match, validate email format, etc.)
    // You should add appropriate validation here

    // Assuming you have a database connection
    $conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert user data into the database (this is a basic example)
    $sql = "INSERT INTO users (email, password, phone, user_role) VALUES ('$email', '$password', '$phone', '$user_role')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful
        header("Location: registration_success.html"); // Redirect to a success page
        exit();
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
