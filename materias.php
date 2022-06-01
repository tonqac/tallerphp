<?php
	$titulo_pagina = "Listado de Materias";
	$nav_item = "materias";
	require "includes/header.php";
?>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Horario</th>
				<th>Código</th>
				<th>Año</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$materia = new Materia();
				$results = $materia->listar();
				foreach($results as $row){
					echo "	<tr>
								<td>$row[nombre]</td>
								<td>$row[horario]</td>
								<td>$row[codigo]</td>
								<td>$row[anio]</td>
								<td class='text-end'>
									<a href='materias_editar.php?id=$row[id]' class='btn btn-secondary'>Editar</a>
									<a href='materias_borrar.php?id=$row[id]' class='btn btn-danger'>Borrar</a>
									<a href='notas.php?id_materia=$row[id]' class='btn btn-warning'>Ver notas</a>
								</td>
							</tr>";
				}
			?>
		</tbody>
	</table>

	<p>
		<a href="materias_editar.php" class="btn btn-success">Crear</a>
	</p>

<?php
	require "includes/footer.php";
?>