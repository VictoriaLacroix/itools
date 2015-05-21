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
				<h1>J-j-jump!</h1>
				<div id="nitrome_game_container" width="550" height="550"></div>
				<script type="text/javascript">
					document.getElementById('nitrome_game_container').innerHTML = unescape('%3Ciframe%20frameborder%3D%220%22%20scrolling%3D%22no%22%20marginheight%3D%220%22%20marginwidth%3D%220%22%20topmargin%3D%220%22%20leftmargin%3D%220%22%20allowtransparency%3D%22true%22%20width%3D%22550%22%20height%3D%22550%22%20src%3D%22http%3A//s3.amazonaws.com/us_nitrome_s3/iframe/jjjump/index.html%22%3E%3C/iframe%3E');
				</script>
			</div>
		</div>
	</body>
</html>
