<html>

<head>
  <style type="text/css">
      body{background:url(bb.jpg);
	   background-size:200% 200%;
	   -moz-background-size:100% 100%; /* Firefox 3.6 */
	   background-repeat:no-repeat;
	   word-wrap:break-word;}
     
      div{background:url(02.jpg);
	  border:2px solid #a1a1a1;
      	  padding:10px 40px; 
          word-wrap:break-word;
          width:1200px;}

     table.black{background:url(02.jpg);}
     p{background:url(02.jpg);}
  </style>
</head>    

<body>
<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="a"; // Mysql password
$db_name="students"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
#$mysubcode=$_POST['mysubcode'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
#$mysubcode = stripslashes($mysubcode);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
#$mysubcode = mysql_real_escape_string($mysubcode);

#$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword' and sub='$mysubcode'";
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count>=1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword");
#session_register("mysubcode");
#header("location:retrieve_teacher.php?subcode=$mysubcode");
header("location:teacher.php?username=$myusername");
}
else {
echo '<form action="back.php" method="post" >';
echo "<div align='center'><font size='5' color='white'> Wrong Username or Password</div>";
echo "<div align='center' ><input type='submit' name='back' value='Back'></div>";
echo '</form>';
}

?>

</body>
</html>
