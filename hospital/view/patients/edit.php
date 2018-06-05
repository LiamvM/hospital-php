<form action="<?= URL ?>patients/editSave/<?= $patient['patient_id'] ?>" method="POST" autocomplete="off">
	<input type="hidden" name=" patient_id" value="<?= $patient_id["patient_id"] ?>">
	<input type="text" value="<?= $patient["patient_name"] ?>" name="patient_name" placeholder="Naam patient">
	<input type="text" value="<?= $patient["patient_status"] ?>" name="patient_status" placeholder="Status patient">
	<select name="client_id">
<?php
	foreach ($clients as $client_two) { 
?>
		<option value="<?= $client_two['client_id'] ?>"><?= $client_two['client_name'] ?></option>
<?php 
	 }
?>    
</select>

<select name="species_id">
<?php
	foreach ($species as $species_two) { 
?>
		<option value="<?= $species_two['species_id'] ?>"><?= $species_two['species_description'] ?></option>
<?php 
	 }
?>
</select>
	<input type="submit" name="">

	<button type="save">Opslaan</button>
</form> 

