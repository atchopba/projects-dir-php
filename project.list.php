<?php
include_once("config.php");
include_once("common.inc.php");
?>

<div class="row">Liste des projets</div>
<table class="table" width="100%" border="1">
	<thead>
		<th>ID</th>
		<th width="20%">Titre</th>
		<th width="50%">Description</th>
		<th>Date d&eacute;but</th>
		<th>Date d'&eacute;ch&eacute;ance</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
	<?php 
		foreach (get_projects() as $p) {
			echo "<tr>";
			echo "<td>". $p["id"] ."</td>";
			echo "<td>". $p["title"] ."</td>";
			echo "<td>". $p["description"] ."</td>";
			echo "<td>". $p["start_date"] ."</td>";
			echo "<td>". $p["due_date"] ."</td>";
			echo "<td><a href='index.php?action=update&id=". $p["id"] ."'>Modifier</a></td>";
			echo "<td><a href='javascript:;' onclick='confirm_delete(\"index.php?action=delete&id=". $p["id"] ."\")'>Supprimer</a></td>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>
