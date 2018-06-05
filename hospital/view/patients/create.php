<form action="<?= URL ?>patients/createSave" method="POST">
	<input type="text" name="patient_name" placeholder="Naam patient" autocomplete="off">
	<input type="text" name="patient_status" placeholder="Status patient" autocomplete="off">
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
</form>

