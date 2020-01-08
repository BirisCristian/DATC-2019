<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php 
include "conexiune.php";
$titlu=$_GET['titlu'];
$autor=$_GET['autor'];
$editura=$_GET['editura'];
$isbn=$_GET['isbn'];
$nr_exemplare=$_GET['nr_exemplare'];
$an=$_GET['an'];

$query1=OCI_Parse($conn,"select count(*) from evidenta_carte where ISBN=$isbn");
OCI_Execute($query1);
$row=OCI_Fetch_row($query1);
if( $row[0]==0)
{
$query=OCI_Parse($conn,"insert into evidenta_carte values($isbn,'$titlu','$autor','$editura',$nr_exemplare,$an)");
OCI_Execute($query);

}
else{echo"A mai fost adaugat!";}

OCI_close($conn);

?>
<p><a href="meniu.htm">Inapoi la meniu</a></p>
</body>
</html>
