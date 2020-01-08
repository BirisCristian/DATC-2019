<?php

	// connect to db
	mysql_connect("localhost", "root", "") or die ("Nu s-a putut conecta la db");
	mysql_select_db("facultate") or die("Nu s-a putut alege baza de date");
	
	$query=mysql_query("select * from studenti_ac");
	
	while($row=mysql_fetch_row($query)){
	
		foreach($row as $value){
			echo "$value"." ";
		}
		echo "<br>";
	
	}
	
?>