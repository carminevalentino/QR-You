<?php
 /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  * File:    serverSearch.php 
  * 
  * Author:   Carmine Valentino; Dylan Pierce; Josh Hutchins
  * Date:     November 18 2013   
  * Course:   INFO 153 
  * 
  * Summary of File: 
  * 
  *   Takes user input (email) and queries database to find a match
  *   if match is found returns associated qr code to the user
  *   
  *
  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  */

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