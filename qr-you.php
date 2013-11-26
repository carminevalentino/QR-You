<?
 /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  * File:    qr-you.php 
  * 
  * Author:   Carmine Valentino; Dylan Pierce; Josh Hutchins
  * Date:     November 18 2013   
  * Course:   INFO 153 
  * 
  * Summary of File: 
  * 
  *   mobile formated page. When scanned, this page is dynamically
  *   created. 
  *   
  *
  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  */

require('db.php');
require('connect.php');

$id = $_GET['id'];

$webaddress = $host . "qr-you/";

$searchDB=mysql_query("SELECT * FROM $members_table WHERE id = $id");

while($sql = mysql_fetch_array($searchDB)){
	$first_name = $sql['first_name'];
	$last_name = $sql['last_name'];
	$phone = $sql['phone'];
	$email = $sql['email'];
	$company = $sql['company'];
	$linkedin = $sql['linkedin'];
	$facebook = $sql['facebook'];
	$twitter = $sql['twitter'];
	$photo = $sql['photo'];

	if($linkedin===NULL){
		$linkedin = "#";
	}
	if($facebook===NULL){
		$facebook = "#";
	}
	if($twitter===NULL){
		$twitter = "#";
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<style>
#container{
	font-size: 23px;
	font-family: arial;
	text-align: center;
	margin-bottom: 25px;
}
</style>
</head>
<body>
	<div id="container">
		<h2><?php echo $first_name . " " . $last_name?></h2>
		<img src=" <?php echo $webaddress . $photo?> " width="auto" height="120px"/>
		<br />
		<i><?php echo $company ?></i>
		<hr>
		<a href=" <?php echo $facebook?>">Facebook</a> | <a href=" <?php echo $twitter?>">Twitter</a> | <a href=" <?php echo $linkedin?>">LinkedIn</a>
		<br />
		<br />
		<a href="mailto: <?php echo $email?>"><?php echo $email?></a>
		<br />
		<br />
		<a href="tel: <?php echo $phone?>"><?php echo $phone?></a>
	</div>
</body>
</html>