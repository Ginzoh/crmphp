<?php 

include("dbconnection.php");

$id=$_GET['id'];
$del=mysqli_query($con,"delete from user where id = '$id'"); 


if($del)
{
    header("location:manage-users.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>

