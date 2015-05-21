<?php
	if(isset($_REQUEST["submit"])){
		$servername="coscvm1.cs.laurentian.ca";
		$username="php";
		$password="Sorry, no way in hell you're getting this password.";
		$database="project";

		$link = new mysqli($servername,$username,$password,$database);

		if($link->connect_errno){
			die;
		}
		
		$name = $_REQUEST['name'];

		$name = str_ireplace("'", '`', $name);
		$name = str_ireplace("meta", 'no', $name);
		$name = str_ireplace("script", 'poo', $name);
		$name = str_ireplace("refresh", 'STOP IT', $name);
		$name = str_ireplace("table", 'cats', $name);
		$name = str_ireplace("body", 'ready', $name);

		$link->query("INSERT INTO sacrifices VALUES ('".$name."',".$_REQUEST["count"].")");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<title id="title">COSC VM #1: Project Page</title>
		<script src="global.js"></script>
	</head>
	<body onload="setup()">
		<div class="navbar">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."sidebar.php";
			?>
		</div>
		<div class="content">
			<div>
				<h1>RUBYMINER: <i>It's like infiniminer only with sacrifices</i></h1>
				<br />
				<p id="things">Gems: 0</p>
				<p id="thingstrength">Gems per click: 0</p>
				<p id="thingsmining">Gem miners: 0</p>
				<p id="thingssecond">Gems per second: 0</p>
				<button id="getthing" type="button" onclick="increment()">Ruby.rb</button><br />
				<button id="autoup" type="button" onclick="buything()">Buy a Gem miner</button>
				<button id="thingpow" type="button" onclick="powerme()">Improve cliks</button>
				<button id="autopow" type="button" onclick="powerthem()">Upgrade Rails</button>
				<br />
				<br />
				<br />
				<form id="sacrifice" method="POST" action="#">
					Sacrifice your Gems?<br />
					In the name of... <input type="text" name="name" id="sacrificename"/><br />
					Amount: <input type="number" name="count" id="sacrificecount"/><br />
					<input type="submit" name="submit" value="Submit to Rubylord Aaron" onclick="return validatesacrifice()"/><br />
					<i style="display: none" id="inputinvalid">Invalid input: Please enter a valid name and number.</i>
				</form>
			</div>
		</div>
		<script>
			if(getCookie("ccount") != ""){
				count = Math.floor(getCookie("ccount"));
			}else{
				count = 0;
				setCookie("ccount",count);
			}

			if(getCookie("autocount") != ""){
				autos = getCookie("autocount");
			}else{
				autos = 0;
				setCookie("autocount",autos);
			}

			if(getCookie("autopower") != ""){
				autopower = getCookie("autopower");
			}else{
				autopower = 1;
				setCookie("autopower",autopower);
			}
			
			if(getCookie("thingpower") != ""){
				thingpower = Math.floor(getCookie("thingpower"));
			}else{
				thingpower = 1;
				setCookie("thingpower",thingpower);
			}

			refreshelements();

			function refreshelements(){
				document.getElementById("things").innerHTML="Gems: " + Math.floor(count);
				document.getElementById("title").innerHTML=Math.floor(count) + " Gems";
				document.getElementById("thingsmining").innerHTML="Gem miners: " + autos;
				document.getElementById("autoup").innerHTML = "Buy a Gem miner: " + Math.floor(Math.pow(25,(autos/15)+1));
				document.getElementById("thingpow").innerHTML = "Improve clicks: " + Math.floor(Math.pow(500,((thingpower-1)/10)+1));
				document.getElementById("autopow").innerHTML = "Upgrade Rails: " + Math.floor(Math.pow(1000,(autopower/10)+1));
				document.getElementById("thingssecond").innerHTML="Gems per second: " + ((autos*autopower)/10);
				document.getElementById("thingstrength").innerHTML="Gems per click: " + thingpower;
			}

			function increment(){
				count+=thingpower;
				setCookie("ccount",Math.floor(count));
				refreshelements();
			}

			function automine(){
				if(autos > 0){
					count += autopower*autos;
					refreshelements();
					setCookie("ccount",Math.floor(count));
				}
			}

			function buything(){
				if(count >= Math.floor(Math.pow(25,(autos/15)+1))){ 
					count-=Math.floor(Math.pow(25,(autos/15)+1));
					++autos;
					refreshelements();
					setCookie("autocount",autos);
					setCookie("ccount",count);
				}
			}
			
			function powerme(){
				if(count >= Math.floor(Math.pow(500,((thingpower-1)/10)+1))){
					count -= Math.floor(Math.pow(500,((thingpower-1)/10)+1));
					++thingpower;
					refreshelements();
					setCookie("thingpower",thingpower);
					setCookie("ccount",count);
				}
			}

			function powerthem(){	
				if(count >= Math.floor(Math.pow(1000,(autopower/10)+1))){
					count -= Math.floor(Math.pow(1000,(autopower/10)+1));
					++autopower;
					refreshelements();
					setCookie("autopower",autopower);
					setCookie("ccount",count);
				}
			}
			
			function validatesacrifice(){
				var asked = document.forms['sacrifice'].elements['sacrificecount'].value;
				var name = document.forms['sacrifice'].elements['sacrificename'].value;

				if(asked <= count && asked > 0 && name.length >= 0){
					count -= asked;
					setCookie("ccount",count);
					return true;
				}else{
					document.getElementById('inputinvalid').style = "display: inline";
					return false;
				}
			}

			//mining
			setInterval(function(){ automine() }, 10000);
		</script>
	</body>
</html>
