<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Typo</title>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<script src="/global.js"></script>
	</head>
	<body onload="setup()">
		<div class="navbar">
			<?php INCLUDE "sidebar.php"?>
		</div>
		<div class="content">
			<div>
				<h1>Sacrificial Chamber</h1>
				
				<?php
					$servername="localhost";
					$username="php";
					$password="hephephephehpehpehpehp";
					$database="project";
					
					$link = new mysqli($servername,$username,$password,$database);
						
					if($link->connect_errno){
						echo "Connection Failed: ".$link->linkect_errno; die;
					}
					
					if($res = $link->query("SELECT * FROM `sacrifices` WHERE 1=1 ORDER BY amount DESC;")){
						echo "<br />";
						echo "<table>";
						echo "<tr><td>Name</td><td>Gem Count</td></tr>";
						while($row = $res->fetch_row()){
							echo "<tr>";
							foreach($row as $value){
								echo "<td>".$value."</td>";
							}
							echo "</tr>";
						}
						echo "</table>";
						$res->close();
					}	
					$link->close();
				?>
			</div>
		</div>
	</body>
</html>
