<?php
require('db.php');
require('connect.php');

$email = $_POST['email'];
$webaddress = $host . "qr-you.php";

$searchDB = mysql_query("SELECT * FROM $members_table WHERE email='$email'");

while($sql = mysql_fetch_array($searchDB)){
	$id = $sql['id'];
}
if($id > 0){
	echo'<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=';
	echo $webaddress;
	echo '?id=';
	echo $id;
	echo '&chld=H|0'; 
	echo '"width="200px" height="200px"/>';
}else{
	echo "Sorry! We cannot find that Email Address!";
}
?>