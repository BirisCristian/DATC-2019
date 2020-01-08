<?php

mysql_connect("localhost", "root", "");
mysql_select_db("facultate");

$marca_veche=$_GET['marca_veche'];

$marca_noua=$_GET['marca_noua'];
$nume_nou=$_GET['nume_nou'];
$prenume_nou=$_GET['prenume_nou'];
$an_nou=$_GET['an_nou'];

$query=mysql_query("update studenti_ac set marca='$marca_noua',nume='$nume_nou',prenume='$prenume_nou',an_studiu='$an_nou' where marca='$marca_veche'");

if($query==FALSE){
	echo "[ FAIL ] Update esuat!";
}

?>