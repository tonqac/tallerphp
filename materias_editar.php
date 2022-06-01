<?php
	$titulo_pagina = "Edición de Materias";
	$nav_item = "materias";
	require "includes/header.php";

	$materia = new Materia();

	// Si recibo POST, significa que el usuario apretó en "Guardar cambios"
	if($_POST){
		foreach($_POST as $n=>$v) $$n = $v;

		if($id==""){
			$ok = $materia->crear($_POST);
		}
		else{
			$ok = $materia->modificar($_POST,$id);
		}


		if($ok){
			header("Location:materias.php?msg=ok");
		}
		else{
			echo "<div class='alert alert-danger'>Ocurrió un error al guardar los cambios.</div>";
		}
	}

	// Si recibo el ID por la URL, entonces estoy modificando al registro
	if($id!=""){
		$row = $materia->buscarPorId($id);
		if($row){
			foreach($row as $n=>$v) $$n = $v;
		}
	}
?>

	<form method="post" style="max-width:40em">
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" class="form-control" placeholder="Ingresar nombre de la materie" name="nombre" value="<?=$nombre?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Horario</label>
			<input type="text" class="form-control" placeholder="Ingresar horario de la materia" name="horario" value="<?=$horario?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Código</label>
			<input type="text" class="form-control" placeholder="Ingresar código de la materia" name="codigo" value="<?=$codigo?>" maxlength="3" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Año de cursada</label>
			<select class="form-select" name="anio" required>
				<option value="">Seleccionar</option>
				<option value="1" <?php if($anio=="1") echo "selected"?>>Primer año</option>
				<option value="2" <?php if($anio=="2") echo "selected"?>>Segundo año</option>
				<option value="3" <?php if($anio=="3") echo "selected"?>>Tercer año</option>
				<option value="4" <?php if($anio=="4") echo "selected"?>>Cuarto año</option>
			</select>
		</div>
		<div class="d-flex my-4">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<button type="submit" class="btn btn-primary px-4">Guardar cambios</button>
			<a href="materias.php" class="btn btn-secondary ms-2">Cancelar</a>
		</div>
		
	</form>

<?php
	require "includes/footer.php";
?>