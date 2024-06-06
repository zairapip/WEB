<!DOCTYPE HTML>

<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<?php
		session_start();
		
		if (!isset($_SESSION['username'])) {
			header("Location: index.html");
			exit();
		}

		 // URL de la API que deseas consumir
		 $url = "https://pipfaster.com:8443/v1/api/users/gets/";
    
		 // Usar file_get_contents para obtener el contenido de la URL
		 $response = file_get_contents($url);
		 
		 // Verificar si hubo algún error
		 if ($response === FALSE) {
			 echo "Error al consumir la API";
		 } else {
			 // Convertir la respuesta JSON a un array asociativo
			 
			// Convertir la respuesta JSON a un array asociativo
		 $data = json_decode($response, true);
		 }
		?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>Hola Rider</h1>
						
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<span class="logo"><img src="images/pip22.gif" alt="logo" /></span>
								<h2>Consultas</h2>
								
								<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>id</th>
														<th>nombre</th>
														<th>apellido</th>
														<th>username</th>
														<th>email</th>
														<th>telefono</th>
													</tr>
												</thead>
												<tbody>
												<?php
														foreach ($data as $user)  {
															echo "<tr>";
															echo "<td>" . $user['id'] . "</td>";
															echo "<td>" . $user['name'] . "</td>";
															echo "<td>" . $user["surname"] . "</td>";
															echo "<td>" . $user["username"] . "</td>";
															echo "<td>" . $user["email"] . "</td>";
															echo "<td>" . $user["telephone"] . "</td>";
															echo "</tr>";
														}
												?>
												</tbody>
											</table>
										</div>
								
							<section id="first" class="main special">						
								<header class="major">
									<h2>Borrar Usuario</h2>
								</header>
								<div class="spotlight">
									<div class="content">								
										<h3 align="left">Borrar Usuario</h3>
							<!-- Form -->						
										<form method="post" action="Delete.php">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="id" id="id" value="" placeholder="id Usuario"required />
												</div>
												</div>
											<br>
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" value="Borrar" class="primary" /></li>
													</ul>
											</div>
										</form>					

							</section>
														<!-- Senders -->
							
					</div>

				<!-- Footer -->
				<footer id="footer">
					<section>
						<h2>PIP Delivery</h2>
						<p>Esta Web fue creada por Zaira Rosales Parra</p>
						<p>Forma parte de un Proyecto Académico</p>
						<ul class="actions">
							<li><a href="generic.html" class="button">Mas Información</a></li>
						</ul>
						
					</section>
					<section>
						<h2>Contactos</h2>
						<dl class="alt">
							<dt>Dirección</dt>
							<dd>A Coruña, Galicia, España</dd>
							<dt>Teléfono</dt>
							<dd>(+34) 000 00 00 00</dd>
							<dt>Email</dt>
							<dd><a href="#">pipdelivery9@gmail.com</a></dd>
						</dl>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
							<li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
						</ul>
					</section>
					
				</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<?php
$conn->close();
?>
	</body>
</html>