<form action="<?php echo base_url() ?>" method="get">
	<select class="form-control" style="width: 500px" name="table">
	
<?php
		foreach($listeTable as $donnee)
		{
			?>
			<option><?php echo $donnee[0]; ?></option>
			<?php
		}
?>
	</select>
	<input name="entrer" type="submit" value="voir">
</form>

<table class="table table-hover" style="width: 1000px; ">
    <caption class="text-center">Liste</caption>
		<thead>
		<tr>
		<?php
		foreach($column as $columns)
		{
			?>
			<th class="text-center" colspan="5"><?php echo($columns['Field']); ?></th>
			<?php
		}
		?>
		</tr>
		</thead>
	<?php
	foreach($liste as $donnees)
	{
		?>
		<tbody>
		<tr>
		<?php
		foreach($column as $columns)
		{
			?>
			<td class="text-center" colspan="5"><?php echo($donnees[$columns['Field']]); ?></td>
			<?php
		}
		?>
		<td><a href="<?php echo base_url() ?>index.php/Welcome/PageUpdate/?table=<?php echo($table); ?>&id=<?php echo($donnees[$column[0]['Field']]); ?>">mettre a jour</a></td>
		<td><a href="<?php echo base_url() ?>index.php/Welcome/Delete/?table=<?php echo($table); ?>&id=<?php echo($donnees[$column[0]['Field']]); ?>">x</a></td>
		</tr>
		</tbody>
		<?php
	}
?>
</table>

<form action="<?php echo base_url() ?>" method="get">
	<input name="ini" type="hidden" value="<?php echo($ini); ?>">
	<input name="table" type="hidden" value="<?php echo($table); ?>">
	<input class="btn btn-success left-rounded" name="prev" type="submit" value="prev">
</form>
<form action="<?php echo base_url() ?>" method="get">
	<input name="ini" type="hidden" value="<?php echo($ini); ?>">
	<input name="table" type="hidden" value="<?php echo($table); ?>">
	<input class="btn btn-success left-rounded" name="next" type="submit" value="next">
</form>