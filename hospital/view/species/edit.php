<form action="<?= URL ?>species/editSave/<?= $species['species_id'] ?>" method="POST" autocomplete="off">
	<input type="text" value="<?= $species["species_description"] ?>" name="species_description" placeholder="Specie">
	<button type="save">Opslaan</button>
</form> 

