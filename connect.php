
<?php
$servername = "localhost";
$username = "root";
$password = "d@rt2.60";
$dbname = "wtl";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO customer (username, email, password, dob) VALUES (?, ?, ?, ?)");

// Check if the statement is prepared successfully
if ($stmt === false) {
    die("Error: " . $conn->error);
}

// Bind the form data to the prepared statement
$stmt->bind_param("ssss", $_POST['username'], $_POST['email'], $_POST['password1'], $_POST['dob']);

// Execute the statement
if ($stmt->execute()) {
    var_dump($_POST);
    echo "Sign Up Complete. You can now login!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
