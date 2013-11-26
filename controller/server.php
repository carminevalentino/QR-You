<?php
 /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  * File:    server.php 
  * 
  * Author:   Carmine Valentino; Dylan Pierce; Josh Hutchins
  * Date:     November 18 2013   
  * Course:   INFO 153 
  * 
  * Summary of File: 
  * 
  *   Insert member into member db. Uploads picture to server dir
  *   Writes link to db. Any handled values are written. script
  *   returns qr code embeded with member id and link to host
  *
  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  */

require('db.php');
require('connect.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$linkedin = $_POST['linkedin'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$photo = $_POST['photo'];

$webaddress = $host . "qr-you.php";

//Client Photo Upload
$target_path_photo = "client_photos/";
$target_path_photo = $target_path_photo . time() . basename($_FILES['photo']['name']);

if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path_photo)) {
	//Photo Uploaded Successfuly
} else{
	//Error Uploading Photo
}

$sql="INSERT INTO $members_table (first_name,last_name,email,phone,company,linkedin,facebook,twitter,photo) 
VALUES ('$first_name', '$last_name', '$email', '$phone', '$company', '$linkedin', '$facebook', '$twitter','$target_path_photo')";

mysql_query($sql) or die ('Error Updating Database');
$id = mysql_insert_id();

echo'<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=';
echo $webaddress;
echo '?id=';
echo $id;
echo '&chld=H|0'; 
echo '"width="200px" height="200px"/>';

?>