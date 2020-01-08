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
$nr=$_GET['nr_ex'];
$query1=OCI_Parse($conn,"select count(*) from evidenta_carte where ISBN=$isbn");
OCI_Execute($query1);
$row=OCI_Fetch_row($query1);
if( $row[0]==0)
{
echo"cartea nu exista!";
}
else{
$query=OCI_Parse($conn,"select*  from evidenta_carte where ISBN=$isbn");
OCI_Execute($query);
$row=OCI_Fetch_row($query);
if($row[4]==0)
echo"cartea nu se mai afla in stoc!";
else
{
$query2=OCI_Parse($conn,"update evidenta_carte set NR_EXEMPLARE=NR_EXEMPLARE-$nr where ISBN=$isbn");
OCI_Execute($query2);
echo"CARTE IMPRUMUTATA!";
echo"<p><a href="."meniu.htm".">Inapoi la meniu</a></p>";
echo"<p><a href="."afisare.htm".">Inapoi la meniu</a></p>";
}
}
?>
</body>
</html>
