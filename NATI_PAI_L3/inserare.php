<?php

	// connect to MySQL
	mysql_connect("localhost", "root", "") or die ("Nu se poate conecta la serverul MySQL");
	mysql_select_db("facultate") or die ("Nu exista DB cautat...");
	
	$marca=$_GET['marca_form'];
	$nume=$_GET['nume_form'];
	$prenume=$_GET['prenume_form'];
	$an=$_GET['an_form'];
	
	$query=mysql_query("select count(*) from studenti_ac where marca='$marca'");
	$row=mysql_fetch_row($query);
	
	$nr_ap=$row[0];
	
	// daca stundetul cu marca $marca nu exista in baza de date, este adaugat
	if($nr_ap==0){
	
		$query_insert=mysql_query("insert into studenti_ac values('$marca', '$nume', '$prenume', '$an')");	
		
		echo "[  OK  ] Student adaugat cu success"."<br>";
	
	} else {
	
		echo "[ FAIL ] Studentul exista deja in tabel"."<br>";
	
	}

?>