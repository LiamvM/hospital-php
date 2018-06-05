<form action="<?= URL ?>clients/editSave/<?= $client['client_id'] ?>" method="POST" autocomplete="off">
	<input type="hidden" name=" client_id" value="<?= $client["client_id"] ?>">
	<input type="text" value="<?= $client["client_name"] ?>" name="client_name" placeholder="Naam client">
	<button type="save">Opslaan</button>
</form> 

