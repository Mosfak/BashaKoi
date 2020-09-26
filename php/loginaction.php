<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bashakoi";
  
$usr=$_POST['usr'];
$pass=$_POST['pass'];


$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    echo "Connection Error!".$conn->connect_error;
    die();
}

$sql="SELECT * FROM users WHERE username=? and password=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$usr,$pass);
$stmt->execute();

$stmt->store_result();
if($stmt->num_rows>0){
    echo "<script>alert('Login Successfull')</script>";
    header("refresh:0;url='../home.html'");
}
else{
    echo "<script>alert('Login Failed!!!')</script>";
    header("refresh:0;url='../index.html'");      
}


?>