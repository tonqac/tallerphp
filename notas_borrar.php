<?php
	$titulo_pagina = "Borrado de Notas";
	$nav_item = "notas";
	require "includes/header.php";

	$nota = new Nota();

	// Si recibo POST, significa que el usuario apretó en "Guardar cambios"
	if($_POST){
		$ok = $nota->borrar($id);
		
		if($ok){
			header("Location:notas.php?msg=ok");
		}
		else{
			echo "<div class='alert alert-danger'>Ocurrió un error al guardar los cambios.</div>";
		}
	}

	// Si recibo el ID por la URL, entonces estoy modificando al registro
	if($id!=""){
		$row = $nota->buscarPorId($id);
		if($row){
			foreach($row as $n=>$v) $$n = $v;
		}
	}
?>

	<form method="post" class="text-center">
		<div class="alert alert-warning" role="alert">
			<h3 class="my-4">¿Estás seguro que deseas borrar la nota de <strong><?=$alumno?> - <?=$materia?></strong>?</h3>
			<p>Recordá que esta acción no podrá deshacerse.</p>
			
			<div class="my-4">
				<input type="hidden" name="id" value="<?php echo $id?>">
				<button type="submit" class="btn btn-primary px-4">Aceptar</button>
				<a href="notas.php" class="btn btn-secondary ms-2">Cancelar</a>
			</div>
		</div>
		
	</form>

<?php
	require "includes/footer.php";
?>