<!-- SQL-Befehle -->

<!-- Einfache Suche -->
<!-- Durchsucht nur die Tabellen Noten, Komponist. Der Rest kann in der Expertensuche angewählt werden-->
<?php
	// Suche ausführen, falls kein Freitext, nichts tun
	if(isset($_POST['freitext'])) {
		$sql_freitext = "SELECT * FROM `view_all` ";
		$sql_freitext .= "WHERE `title` LIKE '%".$_POST['freitext']."%' OR `signature` LIKE '%".$_POST['freitext']."%' OR`linktomusic` LIKE '%".$_POST['freitext']."%' OR `linktosheet` LIKE '%".$_POST['freitext']."%' OR `comment` LIKE '%".$_POST['freitext']."%' OR `level` LIKE '%".$_POST['freitext']."%' OR`occasion` LIKE '%".$_POST['freitext']."%' OR `epochName` LIKE '%".$_POST['freitext']."%' OR `musicstyleName` LIKE '%".$_POST['freitext']."%' OR
		`publisherName` LIKE '%".$_POST['freitext']."%' OR `instruments` LIKE '%".$_POST['freitext']."%' OR `composerFullname` LIKE '%".$_POST['freitext']."%' 
		ORDER BY `title` ASC ";
		$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
		$suche_freitext = mysqli_fetch_assoc($query_freitext);
	}	
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
	
?>


<!-- Expertensuche -->
<?php
	// Feld Titel
	if(isset($_POST['suche_title'])) {
		$sql_expert = "SELECT * FROM `tbl_noten` ";
		$sql_expert .= "LEFT JOIN `tbl_composer` ON `tbl_noten`.`id_composer`=`tbl_composer`.`id` ";
		$sql_expert .= "LEFT JOIN `noten_instrument` ON `tbl_noten`.`id`=`noten_instrument`.`id_noten` ";
		$sql_expert .= "LEFT JOIN `tbl_instrument` ON `noten_instrument`.`id_instrument`=`tbl_instrument`.`id` ";
		$sql_expert .= "WHERE `title` LIKE '%".$_POST['suche_title']."%' ";
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
		// Feld Komponist
		elseif(isset($_POST['suche_composer'])) {
		$sql_expert = "SELECT * FROM `tbl_noten` ";
		$sql_expert .= "LEFT JOIN `tbl_composer` ON `tbl_noten`.`id_composer`=`tbl_composer`.`id` ";
		$sql_expert .= "LEFT JOIN `noten_instrument` ON `tbl_noten`.`id`=`noten_instrument`.`id_noten` ";
		$sql_expert .= "LEFT JOIN `tbl_instrument` ON `noten_instrument`.`id_instrument`=`tbl_instrument`.`id` ";
		$sql_expert .= "WHERE `name` LIKE '%".$_POST['suche_composer']."%' OR `firstname` LIKE '%".$_POST['suche_composer']."%' ";	
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
		elseif(isset($_POST['suche_publisher'])) {
		$sql_expert = "SELECT `name` FROM ".$tbl_composer." WHERE `name` LIKE '%".$_POST["suche_composer"]."%' ";	
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
		
		

	echo mysqli_error($verb);
?>	

<?php
	// Instrumenten-Auswahl mit Checkboxen
	$sql_instrument = "SELECT id, name FROM ".$tbl_instrument." ORDER BY id";	
	$query_instrument = mysqli_query($verb, $sql_instrument) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Epoche-Dropdown
	$sql_epoch = "SELECT id, name FROM ".$tbl_epoch." ORDER BY id DESC";	
	$query_epoch = mysqli_query($verb, $sql_epoch) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Level-Dropdown
	$sql_levels = "SELECT id, level FROM ".$tbl_levels." ORDER BY id DESC";	
	$query_levels = mysqli_query($verb, $sql_levels) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Musicstyle-Dropdown
	$sql_musicstyle = "SELECT id, name FROM ".$tbl_musicstyle." ORDER BY id DESC";	
	$query_musicstyle = mysqli_query($verb, $sql_musicstyle) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Occaion-Dropdown
	$sql_occasion = "SELECT id, occasion FROM ".$tbl_occasion." ORDER BY id DESC";	
	$query_occasion = mysqli_query($verb, $sql_occasion) or die("Fehler:".mysqli_error($verb));
?>


<!-- Random-Befehl für Zufallstreffer -->
<?php
	$sql_random = "SELECT * FROM `tbl_noten` ORDER BY RAND() LIMIT 1";
	$query_random = mysqli_query($verb, $sql_random) or die("Fehler:".mysqli_error($verb));
	$random = mysqli_fetch_assoc($query_random);
	echo mysqli_error($verb);
?>


<!-- Insert-Befehle -->

<!-- Update-Befehle -->

<!-- Delete-Befehl -->

