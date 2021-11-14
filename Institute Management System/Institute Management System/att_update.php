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
echo "<p><a href=\"logout.php\"> logout!</a></p>";
$con = mysql_connect("localhost","root","a");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("students", $con);

$result = mysql_query("SELECT * FROM sub1 where Subject_code=('$_POST[subcode]')");


echo "<table border='1'>
<tr>
<th><font size=\"5\" color=\"white\">USN<font></th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  $a = $row['Class_conducted'];
  $b = $row['Class_attended'];
  $c = ($b/$a)*100;
  echo "<tr>";
  echo "<td><font size=\"4\" color=\"white\">" . $row['USN'] . "<font></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
</body>
</html>
