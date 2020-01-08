<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include "conexiune.php";
$isbn=$_GET['isbn'];
$query1=OCI_Parse($conn,"select count(*) from evidenta_carte where ISBN=$isbn");
OCI_Execute($query1);
$row=OCI_Fetch_row($query1);
if( $row[0]==0)
{
echo"cartea nu exista!";
}
else{echo"A  fost stearsa!";}
$query=OCI_Parse($conn,"delete from evidenta_carte where ISBN=$isbn");
OCI_Execute($query);
?>
</body>
</html>
