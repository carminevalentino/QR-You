
<?php
 /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  * File:    connect.php 
  * 
  * Author:   Carmine Valentino; Dylan Pierce; Josh Hutchins
  * Date:     November 18 2013   
  * Course:   INFO 153 
  * 
  * Summary of File: 
  * 
  *   boilerplate connect to db. Required on each page
  *   
  *   
  *
  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
  */

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>