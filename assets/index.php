

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="singup.css">
    <link rel="icon" href="./assets/images/discord-logo-png-7617.png">
</head>
<script>
  function validateForm() {
    var username = document.getElementById("username").value;
    var password1 = document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;
    var dob=document.getElementById("dob").value;

    if (username.trim() === "") {
      alert("Username can't be empty");
      return false;
    }
    if (password1.trim() === "") {
      alert("Password can't be empty");
      return false;
    }
    if (password1 !== password2) {
      alert("Passwords do not match");
      return false;
    }
    if (dob==="") {
      alert("Date of Birth can't be empty");
      return false;
    }
  }
</script>
<body>
    <div class="container">
   
    <div class="bg">
        <img src="/Mini Project/assets/Loginbg.svg" alt="">
        <a href="/Mini Project/Login page/login.html" class="logo">
            <img src="/Mini Project/assets/images/logo.svg" alt="">
           </a>
    </div>

    
    <div class="rectangle">
    <form name="myForm" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Create an account</h2>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password1" name="password1" required>
        <label for="password">Re-enter Password:</label>
        <input type="password" id="password2" name="password2" required>
        <label for="dob">Date of birth:</label>
        <input type="date" name="dob" required><br>
        
        <input type="submit" value="Sign Up"><br>
        <a href="/Mini Project/Login page/login.html" class="Signup">Already have an account?</a>
      </form>
    </div></div>



</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "d@rt2.60";
$dbname = "wtl";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username1 = $_POST['username'];
    $email1 = $_POST['email'];
    $password1 = $_POST['password1'];
    $dob1 = $_POST['dob'];

echo "Connected successfully!";
$stmt = $conn->prepare("INSERT INTO customer (username, email, password, dob) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username1, $email1, $password1, $dob1);
$stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Calculation saved successfully!";
        } else {
            echo "Error: Failed to save calculation.";
        }
if ($stmt->execute()) {
    echo "Sign Up Complete. You can now login!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>