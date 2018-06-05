	<h1>Hospital</h1>

	<h2>Patients</h2>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Species</th>
				<th>Status</th>
				<th>Client</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		
		<?php
	foreach ($patients as $patient) { 
?>
		<tr>
			<td><?= $patient['patient_name'] ?></td>
			<td><?= $patient['species_description'] ?></td>
			<td><?= $patient['patient_status'] ?></td>
			<td><?= $patient['client_name'] ?></td>
			<td class="center"><a href=<?php echo "edit/". $patient['patient_id'] ."";?> >edit</a></td>
			<td class="center"><a href=<?php echo "delete/". $patient['patient_id'] ."";?> >delete</a></td>
		</tr>
<?php 
	 }
?>
	</tbody>
	</table>
		<p><a href="<?= URL ?>patients/create">Create</a></p>




