<?php
	$titulo_pagina = "Listado de Alumnos";
	$nav_item = "alumnos";
	require "includes/header.php";
?>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$alumno = new Alumno();
				$results = $alumno->listar();
				foreach($results as $row){
					echo "	<tr>
								<td>$row[nombre]</td>
								<td>$row[apellido]</td>
								<td>$row[email]</td>
								<td>$row[telefono]</td>
								<td class='text-end'>
									<a href='alumnos_editar.php?id=$row[id]' class='btn btn-secondary'>Editar</a>
									<a href='alumnos_borrar.php?id=$row[id]' class='btn btn-danger'>Borrar</a>
									<a href='notas.php?id_alumno=$row[id]' class='btn btn-warning'>Ver notas</a>
								</td>
							</tr>";
				}
			?>
		</tbody>
	</table>

	<p>
		<a href="alumnos_editar.php" class="btn btn-success">Crear</a>
	</p>

<?php
	require "includes/footer.php";
?>