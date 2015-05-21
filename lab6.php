<?php
	if(isset($_REQUEST["submit"])){
		if(isset($_REQUEST["username"]) && isset($_REQUEST["address"])){
			setcookie("nag", "", time() - 3600);
			setcookie("username",$_REQUEST["username"]);
			setcookie("address",$_REQUEST["address"]);
			header("Refresh:0");
		}
	}

	if(isset($_REQUEST["exterminate"])){
		setcookie("nag",5);
		setcookie("username", "", time() - 3600);
		setcookie("address", "", time() - 3600);
		header("Refresh:0");
	}
?>

<?php
	if(!(isset($_COOKIE["username"]) && isset($_COOKIE["address"]))){
		echo "Welcome 2 my Universe.";
		if(isset($_COOKIE["nag"]) && $_COOKIE["nag"] > 0){
			$count=$_COOKIE["nag"]-1;
			setcookie("nag",$count);
		}else if(isset($_COOKIE["nag"]) && $_COOKIE["nag"] == 0){
?>
			You've been here for far too long. It is time to register.<br />
			<form method="POST">
				<input type="text" name="username" /><br />
				<input type="text" name="address" /><br />
				<input type="submit" name="submit" value="Register"><br />
			</form>
<?php
			setcookie("nag",5);
		}else{
			setcookie("nag",5);
		}
	}else{
		echo "Welcome back, ".$_COOKIE["username"]."!<br />";
		echo "Also, here's your address: ".$_COOKIE["address"]."<br />";
?>
		<form method="POST">
			<input type="submit" name="exterminate" value="DELETE COOKIES"/>
		</form>
<?php
	}
?>
