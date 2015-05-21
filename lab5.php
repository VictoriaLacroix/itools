<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Lab 5</title>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<script src="/global.js"></script>
	</head>
	<body onload="setup()">
		<div class="navbar">
			<?php INCLUDE "sidebar.php"?>
		</div>
		<div class="content">
			<div>
				<?php
					$servername="itools.cs.laurentian.ca";
					$username="lab3";
					$password="shit I dunno man find ur own";
					$database="lab3db";
					
					$link = new mysqli($servername,$username,$password,$database);
						
					if($link->connect_errno){
						echo "Connection Failed: ".$link->linkect_errno;
					}
					
					echo "Connectioned successfully.<br />";
					
					if($res = $link->query("SELECT group_number, secret, decode(secret, 'lab3'), sent_by_group FROM lab3_secrets WHERE group_number = 1 or sent_by_group = 1")){
						echo "Returned ".$res->num_rows." rows involving Group #1.<br/>";
						echo "<br />";
						echo "<table>";
						echo "<tr><td>group_number</td><td>secret</td><td>secret (decoded)</td><td>sent_by_group</td></tr>";
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
					
					if(isset($_REQUEST["submit"])){
						if(isset($_REQUEST["msg"]) && $_REQUEST["recipient"] >= 0 && $_REQUEST["recipient"] <= 40){
							$msg = $_REQUEST["msg"];
							$recip = $_REQUEST["recipient"];
							$sender = "1";
							$sql = "INSERT INTO lab3_secrets VALUES(".$recip.",encode('".$msg."','lab3'),".$sender.")";
							if($link->query($sql) === TRUE){
								echo "<br/>Successfully sent message.<br/>";
							}
						}else{
							echo "<br />There was an error with your message.<br />";
						}
					}
					$link->close();
				?>
				<br />
				<form method="POST">
					To: <input type="number" name="recipient" /><br />
					Message: <input type="text" name="msg" /><br />
					<input type="submit" name="submit" value="Add Secret" />
				</form>
			</div>
		</div>
	</body>
</html>
