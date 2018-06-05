<?php

require ROOT . "model/PatientsModel.php";
require ROOT . "model/ClientsModel.php";
require ROOT . "model/SpeciesModel.php";

function index()
{
	render("patients/index", array(
		"patients" => getPatients() 
	));
	
}

function create()
{
	render("patients/create", array(
		"clients" => getAllClients(), "species" => getAllSpecies()
	));
	
}

function createSave()
{
	if (createPatient() === true) {
		header("location:" . URL . "patients/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function editSave($id)
{
	if (editPatient($id) === true) {
		header("location:" . URL . "patients/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function edit($id)
{
	render("patients/edit", array(
		"patient" => getPatientById($id), "clients" => getAllClients(), "species" => getAllSpecies()
	));

}

function delete($id)
{
	if (deletePatientById($id)) {
		header("location:" . URL . "patients/index");
		exit();
	} else {
		//er is iets fout gegaan..
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	
	}
}


