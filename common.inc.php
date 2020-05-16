<?php

/**
 * Ajout d'un message dans les logs
 * @param message 	Message
 */
function add_2_log($message) {
	file_put_contents(__log_file__, get_current_date_time()." 	". $message. "\n", FILE_APPEND | LOCK_EX); // en appliquant un file lock (Php ver 5.1 en montant) on s'assure de l'exclusivité du fichier pendant les file open.
}

/**
 * Renvoie de la date + heure à la seconde près
 * @return 
 */
function get_current_timestamp() {
	return date("Y-m-d H:i:s");
}

/**
 * Renvoie de la date + heure + min
 * @return 
 */
function get_current_date_time() {
	return date("Y-m-d H:i");
}

/**
 * Exécution de la requête
 * @param $query 	Requête
 */
function execute_query($query) {
	$is_executed = false;
	// Create connection
	$mysqli = new mysqli(__host__, __user__, __pwd__, __db__);
	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 

	if ($mysqli->query($query) === TRUE) {
	    add_2_log("Enregistrement succès en BDD du client ");
	    $is_executed = true;
	} else {
	    add_2_log("Enregistrement error en BDD du client => $query => error => ".  $mysqli->error);
	}

	$mysqli->close();
	return $is_executed;
}

/**
 * renvoie les projets
 * @return array
 */
function get_projects() {
	$mysqli = new mysqli(__host__, __user__, __pwd__, __db__);
	$query = "SELECT * FROM projects";
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$arr_projects = array();
	if ($result = $mysqli->query($query)) {
	    /* fetch object array */
	    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	        $arr_projects[] = $row;
	    }
	    /* free result set */
	    $result->close();
	}
	/* close connection */
	$mysqli->close();
	// 
	return $arr_projects;
}

?>
