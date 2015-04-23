<?
require('connessione.php');

$idEliminato = $_GET["id"];

$sql = "DELETE FROM `pubblicitario_db`.`msgm_list` WHERE `msgm_list`.`id` = $idEliminato";
$result = $connessione->query($sql);
header("Location: messaggistica.php?message=1");
?>