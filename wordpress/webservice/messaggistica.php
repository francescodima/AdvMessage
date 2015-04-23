<style type="text/css">
a{
	text-decoration: none;
	color: white;
	background-color: gray;
	border:solid black 1px;
	border-radius: 3px;
	padding: 2px;
}

li{
height: 50px;
}
</style>

<?
require_once('connessione.php');
require('test_pop3.php');

if(isset($_GET["message"])){
	if($_GET["message"]==1)
		echo "<h3>Messaggio eliminato</h3>";

	if($_GET["message"]==2)
		echo "<h3>Messaggio pubblicato</h3>";
}

$sql = "SELECT * FROM msgm_list where `moderato` = '0'";
$result = $connessione->query($sql);

if (mysqli_num_rows($result) > 0) {
?>
<ul>
<?
	while ($row = $result->fetch_assoc()) {
		$data= new datetime($row["data_pub"]);
		?>
		<li>
			<?=$row['id']?> <?=$data->format("d/m/Y")?> <?=$row['testo_mess']?>
			<a class="elimina" href="elimina.php?id=<?=$row['id']?>">ELIMINA</a>
			<a class="pubblica" href="pubblica.php?id=<?=$row['id']?>">PUBBLICA</a>
		</li>

		<?
	}
}
else{
	echo "Non ci sono messaggi da pubblicare!";
}
?>
</ul>



<?
?>

