<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include "conexiune.php";
$query=OCI_Parse($conn,"select* from evidenta_carte");
OCI_Execute($query);
echo"<table align='center'> <th>ISBN</th><th>Titlu</th><th>Autor</th><th>Editura</th><th>Nr exemplare</th><th>An</th>";

while($row=OCI_Fetch_row($query))
	{
	echo"<tr>";
	echo"<td>".$row[0]."<td>";
	echo"<td>".$row[1]."<td>";
	echo"<td>".$row[2]."<td>";
	echo"<td>".$row[3]."<td>";
	echo"<td>".$row[4]."<td>";
	echo"<td>".$row[5]."<td>";
	echo"</tr>";
	};
?>
<p><a href="meniu.htm">Inapoi la meniu</a></p>
</body>
</html>
