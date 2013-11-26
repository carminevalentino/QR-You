<?php
require('db.php');
require('connect.php');
?>

<html>
<head>
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/jquery.form.js"></script>
<script> 
// AJAX Form Callback
// Avoid Reloading the Page by Passing 
// Form Data Through AJAX

    // wait for the DOM to be loaded 
    $(document).ready(function() { 
        // bind 'myForm' and provide a simple callback function 
        $('#addmember').ajaxForm(function() {
        });

        $('#addmember').ajaxForm({
          success: function($responseText){
            $('#qrCodeDisplay').fadeOut();
            $('#qrCodeDisplay').html($responseText).fadeIn();
            $('#addmember')[0].reset();
          }
        }) 
    }); 
</script> 
<script>
function searchByEmail($emailString){
  $.ajax({
    type: "post",
    url: "controller/serverSearch.php",
    data: {email:$emailString},
    success: function(output){
      $('#qrCodeDisplay').html(output).fadeIn();
    }
  });
  //alert($emailString);
}
</script>
</head>
<body>
<br />
<h1><center><i>QR</i> YOU?</center></h1>
<center><input type="text" id="searchEmail" style="width:300px" placeholder="Search for QR Code by Email ...">
<input type="submit" value="Search" onClick="searchByEmail($('#searchEmail').val())"></center>

<br />
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
<form name="addmember" id="addmember" method="post" action="controller/server.php" enctype="multipart/form-data">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Tell the World <i>QR</i> You</strong></td>
</tr>
<tr>
<td width="118">First Name</td>
<td width="4">:</td>
<td width="354"><input name="first_name" type="text" id="first_name"></td>
</tr>
<tr>
<td width="118">Last Name</td>
<td width="4">:</td>
<td width="354"><input name="last_name" type="text" id="last_name"></td>
</tr>
<tr>
<td width="118">E-Mail</td>
<td width="4">:</td>
<td width="354"><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td width="118">Phone</td>
<td width="4">:</td>
<td width="354"><input name="phone" type="text" id="phone"></td>
</tr>
<tr>
<td width="118">Company</td>
<td width="4">:</td>
<td width="354"><input name="company" type="text" id="company"></td>
</tr>
<tr>
  <td>Linked-In (URL)</td>
  <td>:</td>
  <td><input name="linkedin" type="text" id="linkedin"></td>
</tr>
<tr>
  <td>Facebook (URL)</td>
  <td>:</td>
  <td><input name="facebook" type="text" id="facebook"></td>
</tr>
<tr>
  <td>Twitter (URL)</td>
  <td>:</td>
  <td><input name="twitter" type="text" id="twitter"></td>
</tr>
<tr>
  <td width="118">Upload Photo</td>
  <td width="4">:</td>
  <td width="354"><p>
    <input name="photo" type="file" id="photo">
    </p></td>
</tr>
<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Create"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br />
<br />
<div id="qrCodeDisplay" align="center">
</div>


</body>
</html>