<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<title>COSC VM #1: Landing Page</title>
		<script src="/global.js"></script>
	</head>
	<body onload="setup()">
		<div class="navbar">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."sidebar.php";
			?>
		</div>
		<div class="content">
			<div>
				<h1>Hexiom Connect</h1>
				<object width=800px height=600px data="hexi.swf" />
			</div>
		</div>
	</body>
</html>
