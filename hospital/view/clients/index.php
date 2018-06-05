
	<h1>Hospital</h1>

	<h2>Clients</h2>
	
	
	
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		</tbody>

<?php
	foreach ($clients as $client) { 
?>
		<tr>
			<td><?= $client['client_name'] ?></td>
			<td class="center"><a href=<?php echo "edit/". $client['client_id'] ."";?> >edit</a></td>
			<td class="center"><a href=<?php echo "delete/". $client['client_id'] ."";?> >delete</a></td>
		</tr>
<?php 
	 }
?>
	</tbody>
	</table>
		<p><a href="<?= URL ?>clients/create">Create</a></p>




