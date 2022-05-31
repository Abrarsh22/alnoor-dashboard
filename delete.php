<?php
session_start(); 
$con=mysqli_connect('localhost','root','','optizmo');

 $id=$_GET['id'];
  $delq="DELETE FROM offers where id='$id'";
  $delres=mysqli_query($con,$delq);
  if($delres){
    echo "<script type=\"text/javascript\">".
        "alert('Offer Deleted');window.location.href='optizmo.php'".
        "</script>";
  }else{
      echo "<script type=\"text/javascript\">".
        "alert('Something Went Wrong');window.location.href='optizmo.php'".
        "</script>";
}


?>
