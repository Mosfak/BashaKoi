<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bashakoi";
  
$email=$_POST['email'];
$pass=$_POST['pass'];
$usr=$_POST['usr'];

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    echo "Connection Error!".$conn->connect_error;
    die();
}

$sql="INSERT INTO users VALUES(?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss",$usr,$email,$pass);
if(!$stmt->execute()){
    echo "<script>alert('Error!!! Try Again!')</script>";
    header("refresh:2;url='../index.html'"); 
}
else{
    echo "<script>alert('Sign Up Successfull')</script>";
    header("refresh:0;url='../home.html'");       
}


?>