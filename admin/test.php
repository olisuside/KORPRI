<?php
session_start();
include('includes/config.php');

$sql="INSERT INTO tblpost(PostTittle,Category,PostDetail,PostUrl,Is_Active,PostImg,PostKegby) VALUES('1as','1','1','1','1','1','1')";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>

$imgfile=$_FILES["postimage"]["name"];


$query=mysqli_query($con,"INSERT INTO tblpost(PostTittle,Category,PostDetail,PostUrl,Is_Active,PostImg,PostKegby) VALUES('$posttitle','$catid','$postdetails','$url','$status','$imgnewfile','$postedby')");