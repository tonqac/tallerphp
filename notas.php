<?php
	$titulo_pagina = "Listado de Notas";
	$nav_item = "notas";
	require "includes/header.php";
?>
	<form>
		<div class="row my-4">
			<div class="col-lg-4">
				<select class="form-select" name="id_alumno">
					<option value="">Todos los alumnos</option>
					<?php
						$alumno = new Alumno();
						$results = $alumno->listar();
						foreach($results as $row){
							echo "<option value='$row[id]' ".($id_alumno==$row["id"]? "selected":"").">$row[nombre] $row[apellido]</option>";
						}
					?>
				</select>
			</div>
			<div class="col-lg-4">
				<select class="form-select" name="id_materia">
					<option value="">Todas las materias</option>
					<?php
						$materia = new Materia();
						$results = $materia->listar();
						foreach($results as $row){
							echo "<option value='$row[id]' ".($id_materia==$row["id"]? "selected":"").">$row[nombre]</option>";
						}
					?>
				</select>
			</div>
			<div class="col-lg-4">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</form>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Alumno</th>
				<th>Materia</th>
				<th>Nota</th>
				<th>Fecha</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$nota = new Nota();
				$results = $nota->listar($id_alumno,$id_materia);
				if($results){
					foreach($results as $row){
						$clase_fila = ($row["nota"]>=6)? "text-success" : "text-danger";
						echo "	<tr>
									<td class='$clase_fila'>$row[alumno]</td>
									<td class='$clase_fila'>$row[materia]</td>
									<td class='$clase_fila'>$row[nota]</td>
									<td class='$clase_fila'>".date("d/m/Y H:i:s",strtotime($row["fecha"]))."</td>
									<td class='text-end'>
										<a href='notas_editar.php?id=$row[id]' class='btn btn-secondary'>Editar</a>
									</td>
								</tr>";
					}	
				}
				else{
					echo "<tr><td colspan='5' class='table-white text-center text-muted'><p class='my-4 py-4'>No se encontraron resultados.</p></td></tr>";
				}
				
			?>
		</tbody>
	</table>

	<p>
		<a href="notas_editar.php" class="btn btn-success">Crear</a>
	</p>

<?php
	require "includes/footer.php";
?>