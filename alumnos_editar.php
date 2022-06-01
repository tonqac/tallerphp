<?php
	$titulo_pagina = "Edición de Alumnos";
	$nav_item = "alumnos";
	require "includes/header.php";

	$alumno = new Alumno();

	// Si recibo POST, significa que el usuario apretó en "Guardar cambios"
	if($_POST){
		foreach($_POST as $n=>$v) $$n = $v;

		if($id==""){
			$ok = $alumno->crear($_POST);
		}
		else{
			$ok = $alumno->modificar($_POST,$id);
		}


		if($ok){
			header("Location:alumnos.php?msg=ok");
		}
		else{
			echo "<div class='alert alert-danger'>Ocurrió un error al guardar los cambios.</div>";
		}
	}

	// Si recibo el ID por la URL, entonces estoy modificando al registro
	if($id!=""){
		$row = $alumno->buscarPorId($id);
		if($row){
			foreach($row as $n=>$v) $$n = $v;
		}
	}
?>

	<form method="post" style="max-width:40em">
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" class="form-control" placeholder="Ingresar nombre del alumno" name="nombre" value="<?=$nombre?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Apellido</label>
			<input type="text" class="form-control" placeholder="Ingresar apellido del alumno" name="apellido" value="<?=$apellido?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" class="form-control" placeholder="Ingresar e-mail del alumno" name="email" value="<?=$email?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Teléfono</label>
			<input type="text" class="form-control" placeholder="Ingresar telefono del alumno" name="telefono" value="<?=$telefono?>">
		</div>
		<div class="d-flex my-4">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<button type="submit" class="btn btn-primary px-4">Guardar cambios</button>
			<a href="alumnos.php" class="btn btn-secondary ms-2">Cancelar</a>
		</div>
		
	</form>

<?php
	require "includes/footer.php";
?>