<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$q="DELETE FROM item WHERE item_code=".$id;
if ($result=mysqli_query($conn,$q)){
	echo "success";
}
?>