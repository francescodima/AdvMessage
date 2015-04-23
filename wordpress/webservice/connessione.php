<?
// hostname
$host = "localhost";   
// utente per la connessione a MySQL  
$user = "root";
// password per l'autenticazione dell'utente 
$pass = "root";
// nome database
$db = "pubblicitario_db";
// connessione tramite mysql_connect()
$connessione = new mysqli($host,$user,$pass,$db);

if ($connessione->connect_error) {
	die("Connessione Fallita".$connessione->connect_error);
}

?>