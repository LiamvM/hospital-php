<?php

function getAllClients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `clients`";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function deleteClientById($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `clients` WHERE `client_id` = :client_id";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":client_id" => $id 
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function createClient() 
{
	$client_name = isset($_POST ['client_name']) ? $_POST['client_name'] : null;

	if ($client_name === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO `clients`(client_name) VALUES (:client_name)";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":client_name"=>$client_name
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function getClientById($id) {
	$db = openDatabaseConnection();
	$sql = ("SELECT * FROM `clients` WHERE `client_id` = :client_id");
	$query = $db->prepare($sql);
	$query->execute(array(
		":client_id"=>$id
	));
	return $query->fetch(PDO::FETCH_ASSOC);
}

function editClient($id)
{
	$client_name = isset($_POST ['client_name']) ? $_POST['client_name'] : null;

	if ($client_name === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = ("UPDATE `clients` SET client_name = :client_name WHERE `client_id` = :id");
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":client_name"=>$client_name, ":id"=>$id
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}