<?php
$email=$_POST['email'];
$username=$_POST['username'];
$password1=$_POST['password1'];
$epassword2=$_POST['password2'];
$dob=$_POST['dob'];

//Database connection
$conn =new mysqli('localhost','root','','WTL project Discord Clone');
if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into Customer(username,email,password,dob)
    values(?,?,?,?)");
    $stmt->bind_param("s,s,s,i",$username,$email,$password1,$dob);
    $stmt->execute();
    echo "Sign Up Complete,You can now Login!!";
    $stmt->close();
    $conn->close();
}
?>