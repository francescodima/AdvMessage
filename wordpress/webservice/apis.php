<?
	header('Content-Type: application/json');
	require('connessione.php');

	//creo l'array vuoto
	$msg = array(
		"messages" => array()
	);

	//prendo i dati dal db 
	$sql="SELECT *
	  FROM msgm_list
   	  WHERE data_pubb >= now() - INTERVAL 1 DAY
   	  ORDER BY visualizzato ASC, data_pubb DESC
   	  LIMIT 3
   	  ";

	$result = $connessione->query($sql);

	while ($row = $result->fetch_assoc()) {

		$msg["messages"][] = array(
				'time' => $row["data_pubb"],
				"message" => $row["testo_mess"] 
			);

		$visualizzatoNew = $row["visualizzato"]+1;

		if($visualizzatoNew>3) $visualizzatoNew = 3;
		
		$query = "UPDATE `pubblicitario_db`.`msgm_list` SET `visualizzato` = '".$visualizzatoNew."' WHERE `msgm_list`.`id` = ".$row["id"];
		$connessione->query($query);

	}
	
	//restituisco l'array in json
	echo json_encode($msg);