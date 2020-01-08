<?php

mysql_connect("localhost", "root", "");
mysql_select_db("facultate");

$marca=$_GET['marca'];

$query=mysql_query("select * from studenti_ac where marca='$marca'");
$query_note=mysql_query("select codDisciplina, nota from note where marca='$marca'");
$row=mysql_fetch_row($query);
// $row_disc=mysql_fetch_row($query_note);

foreach($row as $element){
	echo "$element"." ";
}
while($row=mysql_fetch_row($query_note)){
	foreach($row as $element){
		echo "$element"." ";
	}
}

// if($row>0){
// 
// 	echo "<table align=\"center\">";
// 	echo "<tr>";
// 	// marca e primary key
// 	foreach($row as $element){
// 		echo "<td>";
// 		echo "$element"." ";
// 		echo "</td>";
// 	}
// 	echo "</tr>";
// 	echo "</table>";
// 
// } else {
// 	echo "Nu s-a gasit studentul cu marca '$marca_veche'";
// }

?>