<?php
	$titulo_pagina = "Edición de Notas";
	$nav_item = "notas";
	require "includes/header.php";

	$notaObj = new Nota();

	// Si recibo POST, significa que el usuario apretó en "Guardar cambios"
	if($_POST){
		foreach($_POST as $n=>$v) $$n = $v;

		if($id==""){
			$ok = $notaObj->crear($_POST);
		}
		else{
			$ok = $notaObj->modificar($_POST,$id);
		}


		if($ok){
			header("Location:notas.php?msg=ok");
		}
		else{
			echo "<div class='alert alert-danger'>Ocurrió un error al guardar los cambios.</div>";
		}
	}

	// Si recibo el ID por la URL, entonces estoy modificando al registro
	if($id!=""){
		$row = $notaObj->buscarPorId($id);
		if($row){
			foreach($row as $n=>$v) $$n = $v;
		}
	}
?>

	<form method="post" style="max-width:40em">
		<div class="mb-3">
			<label class="form-label">Alumno</label>
			<select class="form-select" name="id_alumno" required>
				<option value="">Seleccionar</option>
				<?php
					$alumno = new Alumno();
					$results = $alumno->listar();
					foreach($results as $row){
						echo "<option value='$row[id]' ".($id_alumno==$row["id"]? "selected":"").">$row[nombre] $row[apellido]</option>";
					}
				?>
			</select>
		</div>
		<div class="mb-3">
			<label class="form-label">Materia</label>
			<select class="form-select" name="id_materia" required>
				<option value="">Seleccionar</option>
				<?php
					$materia = new Materia();
					$results = $materia->listar();
					foreach($results as $row){
						echo "<option value='$row[id]' ".($id_materia==$row["id"]? "selected":"").">$row[nombre]</option>";
					}
				?>
			</select>
		</div>
		<div class="mb-3">
			<label class="form-label">Nota</label>
			<select class="form-select" name="nota" required>
				<option value="">Seleccionar</option>
				<?php
					for($i=1;$i<=10;$i++){
						echo "<option value='$i' ".($i==$nota? "selected":"").">$i</option>";
					}
				?>
			</select>
		</div>
		<div class="d-flex my-4">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<button type="submit" class="btn btn-primary px-4">Guardar cambios</button>
			<a href="notas.php" class="btn btn-secondary ms-2">Cancelar</a>
		</div>
		
	</form>

<?php
	require "includes/footer.php";
?>