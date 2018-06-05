<?php

require ROOT . "model/speciesModel.php";

function index()
{
	render("species/index", array(
		"species" => getAllSpecies()
	));

	
}

function create()
{
	render("species/create");
	
}

function createSave()
{
	if (createSpecie() === true) {
		header("location:" . URL . "species/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function editSave($id)
{
	if (editSpecie($id) === true) {
		header("location:" . URL . "species/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function edit($id)
{
	render("species/edit", array(
		"species" => getSpecieById($id)
	));

}

function delete($id)
{
	if (deleteSpecieById($id)) {
		header("location:" . URL . "species/index");
		exit();
	} else {
		//er is iets fout gegaan..
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	
	}
}


