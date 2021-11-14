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
<center>
<?php
$con = mysql_connect("localhost","root","a");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("students", $con);

$result = mysql_query("SELECT * FROM sub1 where USN='$_POST[usn]' ");

echo "<table border='1'>
<tr>
<th><font size=\"5\" color=\"white\">SUB_CODE</font></th>
<th><font size=\"5\" color=\"white\">MAX_CLASSES</font></th>
<th><font size=\"5\" color=\"white\">CONDUCTED</font></th>
<th><font size=\"5\" color=\"white\">ATTENDED</font></th>
<th><font size=\"5\" color=\"white\">PERCENTAGE</font></th>
<th><font size=\"5\" color=\"white\">ZONE</font></th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  $a = $row['Class_conducted'];
  $b = $row['Class_attended'];
  $c = ($b/$a)*100;
  $c = number_format ($c, 2);
  $d = "";
  echo "<tr>";
  echo "<td><font size=\"4\" color=\"white\">" . $row['Subject_code'] . "</font></td>";
  echo "<td><font size=\"4\" color=\"white\">" . $row['Max_no_of_class'] . "</font></td>";
  echo "<td><font size=\"4\" color=\"white\">" . $row['Class_conducted'] . "</font></td>";
  echo "<td><font size=\"4\" color=\"white\">" . $row['Class_attended'] . "</font></td>";
  echo "<td><font size=\"4\" color=\"white\">" . $c . "</font></td>";
  if ($c>=80) echo "<td bgcolor=\"green\"><font size=\"4\" color=\"white\">" . $d . "</font></td>";
  elseif ($c>=75 ) echo "<td bgcolor=\"orange\"><font size=\"4\" color=\"white\">" . $d . "</font></td>";
  else echo "<td bgcolor=\"red\"><font size=\"4\" color=\"white\">" . $d . "</font></td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br \><br \>";

echo '<form action="back.php" method="post" >';
echo "<p align='center' ><input type='submit' name='back' value='Back'></p>";
echo '</form>';

mysql_close($con);
?>
</center>
</body>
</html>
