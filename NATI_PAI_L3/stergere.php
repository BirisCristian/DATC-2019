<?php
	if(!isset($_GET["marca"])){
?>
		<form method="GET" action="">
			<input type="text" name="marca">
			<input type="SUBMIT" value="Sterge marca">
		</form>
<?php
	} else {
	
		$marca=$_GET["marca"];
		
		mysql_connect("localhost", "root", "") or die("Nu s-a putut conecta la PHPMyAdmin");
		mysql_select_db("facultate") or die("Nu s-a putut conecta la baza de date");
		
		$query_exist=mysql_query("select count(*) from studenti_ac where marca='$marca'");
		$exist_row=mysql_fetch_row($query_exist);
		$nr_ap=$exist_row[0];
		
		if($nr_ap==0){
		
			echo "[ FAIL ] Studentul cautat nu exista"."<br>";
		
		} else {
		
			echo "[  OK  ] Stergere studentul cu marca '$marca'"."<br>";
			
			$query_delete=mysql_query("delete from studenti_ac where marca='$marca'");
			
			if($query_delete!=FALSE){
			
				echo "[ DONE ] Stergerea studentului s-a efectuat cu succes!"."<br>";
			
			}
		
		}
	
	}
?>