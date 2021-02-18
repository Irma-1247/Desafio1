<!DOCTYPE html>
<html>
<head>
	<title>Divisas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/2066ce508e.js" crossorigin="anonymous"></script>
</head>
<body>
	<section>
		<h1>MiConversor</h1><br>
		<div class="contenedor">
			<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
					<input type="number" class="form-control" name="cantidad" required><br>
					<div class="selectbox">
						<div class="select" id="select">
							<div class="contenido-select">
								<h3 class="titulo">Selecciona la moneda</h3>						
							</div>							
						</div>
						<!--opciones-->
						<div class="opciones" id="opciones">
							<a href="#" class="opcion">
								<div class="contenido-opcion">
									<img src="img/EEUU.png">
									<div class="textos">
										<h3 class="titulo">Dólares americanos</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion">
								<div class="contenido-opcion">
									<img src="img/union_europea.png">
									<div class="textos">
										<h3 class="titulo">Euro</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion">
								<div class="contenido-opcion">
									<img src="img/japon.png">
									<div class="textos">
										<h3 class="titulo">Yen Japonés</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion">
								<div class="contenido-opcion">
									<img src="img/reino_unido.png">
									<div class="textos">
										<h3 class="titulo">Libra Esterlina</h3>
									</div>
								</div>
							</a>
						</div>
					</div>
					<input type="hidden" name="moneda" id="inputSelect" value="">
				</div>
				<img id="tri" src="img/tri.png"><br><br>
				<div class="form-group">
					<div class="selectbox2">
						<div class="select2" id="select2">
							<div class="contenido-select">
								<h3 class="titulo">Selecciona la moneda</h3>						
							</div>							
						</div>
						<!--opciones-->
						<div class="opciones2" id="opciones2">
							<a href="#" class="opcion2">
								<div class="contenido-opcion">
									<img src="img/EEUU.png">
									<div class="textos">
										<h3 class="titulo">Dólares americanos</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion2">
								<div class="contenido-opcion">
									<img src="img/union_europea.png">
									<div class="textos">
										<h3 class="titulo">Euro</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion2">
								<div class="contenido-opcion">
									<img src="img/japon.png">
									<div class="textos">
										<h3 class="titulo">Yen Japonés</h3>
									</div>
								</div>
							</a>
							<a href="#" class="opcion2">
								<div class="contenido-opcion">
									<img src="img/reino_unido.png">
									<div class="textos">
										<h3 class="titulo">Libra Esterlina</h3>
									</div>
								</div>
							</a>
						</div>
					</div>
					<input type="hidden" name="moneda2" id="inputSelect2" value="">
				</div>
				<button type="submit" name="enviar" class="btn btn-primary">Convertir</button><br><br>
			</form>
		</div>
		<div>
			<?php
			if (isset($_POST['enviar'])):
				//Recibiendo variables
				$cantidad = $_POST['cantidad'];
				$moneda = $_POST['moneda'];
				$moneda2 = $_POST['moneda2'];
				$total;
				//Verificando que seleccionaran moneda
				if ($moneda == "" || $moneda2 == "") {
					echo "Seleccione las monedas con las que se trabajará";
				}
				else {
				//Proceso
					if ($moneda == "Dólares americanos") {
						if ($moneda2 == "Euro") {
							$valor = 0.83;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Yen Japonés")
						{
							$valor = 104.96;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Libra Esterlina") {
							$valor = 0.72;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
					}
					else if ($moneda == "Euro") {
						if ($moneda2 == "Dólares americanos") {
							$valor = 1.21;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Yen Japonés")
						{
							$valor = 127.21;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Libra Esterlina") {
							$valor = 0.88;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
					}
					elseif ($moneda == "Yen Japonés") {
						if ($moneda2 == "Dólares americanos") {
							$valor = 0.0095;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Euro") {
							$valor = 0.0079;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Libra Esterlina") {
							$valor = 0.0069;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
					}
					elseif ($moneda == "Libra Esterlina") {
						if ($moneda2 == "Dólares americanos") {
							$valor = 1.38;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Euro") {
							$valor = 1.14;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
						elseif ($moneda2 == "Yen Japonés") {
							$valor = 145.29;
							$total = $cantidad * $valor;
							echo "<p>" . $cantidad . " " . $moneda . "</p>";
							echo "=<br>";
							echo "<p>" . $total . " " . $moneda2 . "</p>";
						}
					}
				}
			endif;
			?>
		</div>
		<script src="js/main.js"></script>
	</section>
</body>
</html>