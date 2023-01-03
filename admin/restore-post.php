<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $postid = $_GET['id'] ;
    $query = mysqli_query($con, "UPDATE tblpost set Is_Active=1 where id='$postid'");
    if($query)
{
echo "Post deleted ";
}
else{
echo"Something went wrong . Please try again.";    
} 
    header('location:post-trash.php');
    
}
