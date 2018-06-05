<?php

function getAllSpecies()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species`";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function deleteSpecieById($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `species` WHERE `species_id` = :id";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":id" => $id 
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function createSpecie() 
{
	$species_description = isset($_POST ['species_description']) ? $_POST['species_description'] : null;

	if ($species_description === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO `species`(species_description) VALUES (:species_description)";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":species_description"=>$species_description
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function getSpecieById($id) {
	$db = openDatabaseConnection();
	$sql = ("SELECT * FROM `species` WHERE `species_id` = :species_id");
	$query = $db->prepare($sql);
	$query->execute(array(
		":species_id"=>$id
	));
	return $query->fetch(PDO::FETCH_ASSOC);
}

function editSpecie($id)
{
	$species_description = isset($_POST ['species_description']) ? $_POST['species_description'] : null;

	if ($species_description === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = ("UPDATE `species` SET species_description = :species_description WHERE `species_id` = :species_id");
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":species_id"=>$id, "species_description"=>$species_description
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}