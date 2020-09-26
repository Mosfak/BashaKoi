<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bashakoi";
  
$usrnm = $_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$flattype=$_POST['flattype'];
$flatsize=$_POST['flatsize'];
$flataddress=$_POST['flataddress'];
$messege=$_POST['messege'];


$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    echo "Connection Error!".$conn->connect_error;
    die();
}



if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
//   if( in_array($imageFileType,$extensions_arr) ){
 
//      // Insert record
//      $query = "insert into images(name) values('".$name."')";
//      mysqli_query($con,$query);
  
//      // Upload file
//      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

//   }
 
 }


$sql="INSERT INTO flatforrent VALUES(?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss",$usrnm,$email,$phone,$address,$flattype,$flatsize,$name,$flataddress,$messege);


if(!$stmt->execute()){
    echo "<script>alert('Error!!! Try Again!')</script>";
    //header("refresh:2;url='../index.html'"); 
}
else{
    echo "<script>alert('Sign Up Successfull')</script>";
    header("refresh:0;url='../home.html'");       
}


?>