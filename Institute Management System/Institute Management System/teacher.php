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

     table.black{background:url(02.jpg);}
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
$myusername = $_GET['username'];
$sql="SELECT * FROM $tbl_name WHERE username=('$myusername')";
$result=mysql_query($sql);

echo "<center>";
echo "<center>";
echo "<font size='6' color='white' /><div><h1>Attendance Tracker</h1></div><br \><br \><br \>";
echo "<table border='1'>";
echo "<tr>";
echo "<th><font size=\"5\" color=\"white\">Courses Offered</font></th>";
echo "</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><font size='4' color='white'><a href='retrieve_teacher.php?username=$myusername&subcode=".$row['sub']."'>" . $row['sub'] . "</a></font></td>";
  echo "</tr>"; 
  }
?>
</body>
</html>
