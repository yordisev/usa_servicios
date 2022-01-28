<?php 
	require "../template/header.php";
 ?>
	<main class="container">
		<h1 class="text-center">Editar personas</h1>
		<a href="<?= BASE_URL ?>/views/persona" >Lista persona</a>
		<br>
		<br>
		<form id="frmEditar">
			<input type="hidden" id="txtId" name="txtId" required="">
		  <div class="mb-3">
		    <label for="txtNombre" class="form-label">Nombre</label>
		    <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombres" required >
		  </div>
		  <div class="mb-3">
		    <label for="txtApellido" class="form-label">Apellido</label>
		    <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Apellidos" required>
		  </div>
		  <div class="mb-3">
		    <label for="txtTelefono" class="form-label">Teléfono</label>
		    <input type="number" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Número de teléfono" required>
		  </div>
		  <div class="mb-3">
		    <label for="txtEmail" class="form-label">Email</label>
		    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo electrónico" required>
		  </div>
		  <button type="submit" class="btn btn-info"><i class="fas fa-user-edit"></i> Actualizar</button>
		</form>	
	</main>
<?php 
	require "../template/footer.php";
 ?>
<script src="../template/js/functions-persona.js"></script>
<script>
	let id = "<?= $_GET['p']?>";
	fntMostrar(id);
</script>
