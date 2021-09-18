<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Gestor de Tareas</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- JS Externos -->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<!-- JS Internos -->
		<script src="<?= base_url('/assets/js/gestor_tareas.js')?>"></script>
		<script>
			const base_url = '<?= base_url() ?>';
		</script>
	</head>

	<body>
		<div class="container">
			<header>
				<div class="row">
					<div class="col-12">
						<h1>Gestor de Tareas</h1>
						<hr />
					</div>
				</div>
			</header>

			<div id="body">
				<section id="alta-tarea">
					<form id="alta-formulario">
						<div class="row">
							<div class="col-12 d-flex align-items-center">
								<input type="text" id="nombre" name="nombre" class="form-control mr-4" placeholder="Nueva tarea...">
								<div class="form-check d-flex mr-4">
									<label class="form-check-label" for="etiqueta-php">PHP</label>
									<input type="checkbox" class="form-check-input" id="etiqueta-php" name="etiquetas[]" value="1">
								</div>
								<div class="form-check d-flex mr-4">
									<label class="form-check-label" for="etiqueta-javascript">Javascript</label>
									<input type="checkbox" class="form-check-input" id="etiqueta-javascript" name="etiquetas[]" value="2">
								</div>
								<div class="form-check d-flex mr-4">
									<label class="form-check-label" for="etiqueta-css">CSS</label>
									<input type="checkbox" class="form-check-input" id="etiqueta-css" name="etiquetas[]" value="3">
								</div>
								<button type="submit" id="enviar" class="btn btn-success">Añadir</button>
							</div>
						</div>
					</form>
				</section>
				<section id="listado-tareas">

				</section>
			</div>
		</div>
	</body>
</html>