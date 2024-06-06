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
		include 'conexion.php';
		
		if (!isset($_SESSION['username'])) {
			header("Location: login.html");
			exit();
		}

		$username = $_SESSION['username'];

		$sql = "SELECT * FROM tsenders WHERE email ='$username'";
        $result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		}
		?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>Hola Rider</h1>
						<!-- usuario logeado --><p><?php echo $username;?></p>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<span class="logo"><img src="images/pip22.gif" alt="logo" /></span>
								<h2>Consultas</h2>
								<p>Numero de telefono: <?php echo $row['telephone'];?></p>
								<p>Codigo de raider:  <?php echo $row['code_sender'];?></p>
								<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Código de orden</th>
														<th>Pago</th>
														<th>fecha</th>
													</tr>
												</thead>
												<tbody>
												<?php
												// Fecha actual
														$current_date = date('Y-m-d');
														// Fecha hace 5 días
														$five_days_ago = date('Y-m-d', strtotime('-15 days'));
														$rider_code=$row['code_sender'];
														// Consulta SQL para seleccionar las órdenes
														$sql = "SELECT * FROM torders WHERE code_sender_id = '$rider_code' AND application BETWEEN '$five_days_ago' AND '$current_date'";

														$result = $conn->query($sql);

														while($row = $result->fetch_assoc()) {
															echo "<tr>";
															echo "<td>" . $row["code_order"] . "</td>";
															echo "<td>" . $row["pay"] . "</td>";
															echo "<td>" . $row["application"] . "</td>";
															echo "</tr>";
														}
    
												?>
												</tbody>
											</table>
										</div>
								
								
							</section>

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