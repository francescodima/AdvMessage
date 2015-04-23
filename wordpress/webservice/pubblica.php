<?
require('connessione.php');

$idPubblicato = $_GET["id"];

$sql = 
	"UPDATE 
		`pubblicitario_db`.`msgm_list` 
	SET 
		`moderato` = '1', 
		`data_pubb` = NOW() 
	WHERE 
		`msgm_list`.`id` =$idPubblicato";
$result = $connessione->query($sql);
header("Location: messaggistica.php?message=2");
?>

