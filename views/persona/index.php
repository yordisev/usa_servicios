<?php 
	require "../template/header.php";
 ?>
	<main class="container">
		<h1 class="text-center">Lista de personas</h1>
		<a href="crear-persona.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear persona</a>
		<table id="tblPersonas" class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Apellido</th>
		      <th scope="col">Teléfono</th>
		      <th scope="col">Email</th>
		      <th scope="col">Opciones</th>
		    </tr>
		  </thead>
		  <tbody id="tblBodyPersonas">
		  </tbody>
		</table>
	</main>
<?php 
	require "../template/footer.php";
 ?>

 <script src="../template/js/functions-persona.js"></script>

