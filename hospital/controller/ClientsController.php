<?php

require ROOT . "model/clientsModel.php";

function index()
{
	render("clients/index", array(
		"clients" => getAllClients()
	));

	
}

function create()
{
	render("clients/create");
	
}

function createSave()
{
	if (createClient() === true) {
		header("location:" . URL . "clients/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function editSave($id)
{
	if (editClient($id) === true) {
		header("location:" . URL . "clients/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function edit($id)
{
	render("clients/edit", array(
		"client" => getClientById($id)
	));

}

function delete($id)
{
	if (deleteClientById($id)) {
		header("location:" . URL . "clients/index");
		exit();
	} else {
		//er is iets fout gegaan..
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	
	}
}


