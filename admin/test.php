<?php
session_start();
include('includes/config.php');

<?php
$postid = $_GET['id'];
$que = mysqli_query($con, "SELECT tblpost.id as postid,tblpost.PostImg,tblpost.PostTittle as tittle,tblpost.PostDetail,tblcategory.CategoryName as category,tblcategory.id as catid, from tblpost full outer join tblcategory on tblpost.Category=tblcatEgory.id where tblpost.id='$postid' and tblpost.Is_Active=1 ");
while ($row = mysqli_fetch_array($que)) {
?>