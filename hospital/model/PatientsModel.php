<?php

function getAllPatients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `patients`";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function deletePatientById($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `patients` WHERE `patient_id` = :patient_id";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":patient_id" => $id 
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function createPatient() 
{
	$patient_name = isset($_POST ['patient_name']) ? $_POST['patient_name'] : null;
	$patient_status = isset($_POST ['patient_status']) ? $_POST['patient_status'] : null;
	$species_id = isset($_POST ['species_id']) ? $_POST['species_id'] : null;
	$client_id = isset($_POST ['client_id']) ? $_POST['client_id'] : null;


	if ($patient_status === null || $patient_name === null || $client_id === null || $species_id === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO `patients`(patient_name, patient_status, species_id, client_id) VALUES (:patient_name, :patient_status, :species_id, :client_id)";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":patient_name"=>$patient_name, ":patient_status"=>$patient_status, ":species_id"=>$species_id, ":client_id"=>$client_id
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function getPatientById($id) {
	$db = openDatabaseConnection();
	$sql = ("SELECT * FROM `patients` WHERE `patient_id` = :patient_id");
	$query = $db->prepare($sql);
	$query->execute(array(
		":patient_id"=>$id
	));
	return $query->fetch(PDO::FETCH_ASSOC);
}

function editPatient($id)
{
	$patient_name = isset($_POST ['patient_name']) ? $_POST['patient_name'] : null;
	$patient_status = isset($_POST ['patient_status']) ? $_POST['patient_status'] : null;
	$species_id = isset($_POST ['species_id']) ? $_POST['species_id'] : null;
	$client_id = isset($_POST ['client_id']) ? $_POST['client_id'] : null;

	if ($patient_status === null || $patient_name === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = ("UPDATE `patients` SET patient_name = :patient_name, patient_status = :patient_status, client_id = :client_id, species_id = :species_id WHERE `patient_id` = :patient_id");
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":patient_name"=>$patient_name, ":patient_status"=>$patient_status, ":patient_id"=>$id, ":client_id"=>$client_id, ":species_id"=>$species_id
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function getPatients() {
	/*$db = openDatabaseConnection();
	$query = $db->prepare("SELECT patients.patient_id, patients.patient_name, species.species_description, clients.client_name
							FROM patients
							INNER JOIN clients ON patients.client_id = clients.client_id
							INNER JOIN species ON patients.species_id = species.species_id");
	$query->execute();
	return $query->fetchAll(PDO::FETCH_ASSOC);*/

	$db = openDatabaseConnection();
	$query = $db->prepare("SELECT *
							FROM patients
							LEFT JOIN clients ON patients.client_id = clients.client_id
							LEFT JOIN species ON patients.species_id = species.species_id");
	$query->execute();
	return $query->fetchAll(PDO::FETCH_ASSOC);
}