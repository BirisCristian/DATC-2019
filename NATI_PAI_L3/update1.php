<?php

mysql_connect("localhost", "root", "");
mysql_select_db("facultate");

$marca_veche=$_GET['marca_veche'];

$query=mysql_query("select * from studenti_ac where marca='$marca_veche'");
$row=mysql_fetch_row($query);

if($row>0){

	echo "<table align=\"center\">";
	echo "<tr>";
	// marca e primary key
	foreach($row as $element){
		echo "<td>";
		echo "$element"." ";
		echo "</td>";
	}
	echo "</tr>";
	echo "</table>";

	echo "<form method=\"GET\" action=\"http://localhost/update2.php\">";
	
		echo "Marca:";
		echo "<input type=\"text\" name=\"marca_noua\" value=\"$row[0]\">";
		echo "Nume:";
		echo "<input type=\"text\" name=\"nume_nou\" value=\"$row[1]\">";
		echo "Prenume:";
		echo "<input type=\"text\" name=\"prenume_nou\" value=\"$row[2]\">";
		echo "An:";
		echo "<input type=\"text\" name=\"an_nou\" value=\"$row[3]\">";
		// marca veche
		echo "<input type=\"hidden\" name=\"marca_veche\" value=\"$marca_veche\">";
		echo "<br><br>";
		echo "<input type=\"SUBMIT\" value=\"Update\">";
		
	echo "</form>";

} else {
	echo "Nu s-a gasit studentul cu marca '$marca_veche'";
}

?>