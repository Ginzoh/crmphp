<?php 

include("dbconnection.php");

$id=$_GET['id'];
$del=mysqli_query($con,"delete from animal where id = '$id'"); 


if($del)
{
    header("location:view-animals.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>

