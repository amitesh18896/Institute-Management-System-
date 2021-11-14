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
          width:1200px;
          border-radius:25px;}

     table{background:url(02.jpg);}
  </style>
</head>

<body>

<?php

$cb = $_POST['cb'];
$con = mysql_connect("localhost","root","a");

if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("students", $con);
$subcode=$_POST['subcode'];
$myusername=$_POST['username'];
$query="UPDATE sub1 SET class_conducted=class_conducted+1 WHERE Subject_code=('$subcode')";
mysql_query($query) or die ('Error Updating the Database' . mysql_errno());

foreach($cb as $key=>$value)
{  $query="UPDATE sub1 SET class_attended=class_attended+1 WHERE USN='$value' AND Subject_code=('$subcode')";
  mysql_query($query) or die ('Error Updating the Database' . mysql_errno());
}
header("location:retrieve_teacher.php?username=$myusername&subcode=$subcode");
?>
</body>
</html>
