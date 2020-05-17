<?php

include_once("config.php");
include_once("common.inc.php");


if (isset($_POST["valid_project"])) {
	$id = isset($_POST["id_"]) ? htmlentities($_POST["id_"]) : "";
	$title = isset($_POST["title"]) ? htmlentities($_POST["title"]) : "";
	$description = isset($_POST["description"]) ? htmlentities($_POST["description"]) : "";
	$start_date = isset($_POST["start_date"]) ? htmlentities($_POST["start_date"]) : "";
	$due_date = isset($_POST["due_date"]) ? htmlentities($_POST["due_date"]) : "";

	// if id_, update
	if (!empty($id)) {
		$query = "UPDATE projects SET 
					title='". $title ."', description='". $description ."', 
					start_date='". $start_date ."', due_date='". $due_date ."' 
				WHERE id='". $id ."'";
	} else {
		// else ... insert	
		$query = "INSERT INTO projects (title, description, start_date, due_date) 
				VALUES ('". $title ."', '". $description ."', '". $start_date ."', '". $due_date ."')";

	}

	// if request not well executed
	if (!execute_query($query)) {
		echo '<div style="color:red;">Erreur lors de l\'execution de la requête!</div>';
	} else {
		echo '<div style="color:green;">Sauvegarde succ&egrave;s!</div>';
	}
}

// 
$id = "";
$title = "";
$description = "";
$start_date = "";
$due_date = "";

if (isset($_GET["action"]) && isset($_GET["id"])) {
	
	$action = $_GET["action"];
	$id = $_GET["id"];

	if ($action == "delete") {

		$query = "DELETE FROM projects WHERE id='". $id ."'";
		execute_query($query);
		header("location: index.php");

	} else if ($action == "update") {

		$arr_project = get_projects($id);
		if (sizeof($arr_project) > 0) {
			$project = $arr_project[0];
			$id = $project["id"];
			$title = $project["title"];
			$description = $project["description"];
			$start_date = $project["start_date"];
			$due_date = $project["due_date"];	
		}

	}
}

?>