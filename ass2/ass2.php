<!DOCTYPE HTML>

<!-- ass2.php by Victoria Lacroix and Kaitlynn Anderson-Butcher -->

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<title>Assignment 2</title>
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
				<?php
					if(isset($_REQUEST['submit'])){
						display_output_page();
					}
					else{
						display_form_page();		
					}
				?>
			</div>
		</div>		
	</body>		
</html>


<?php
	//Function definitions go down here.
	//Function usages go up there in the page body.
	//I've reorganized the thing so it's less php-heavy
	//We should keep our comments like this in PHP so they
	//are not visible to the nooblets
	//also, did not know you could literally embed HTML code in
	//PHP. neato.
?>

<?php
	function display_form_page(){
		//REQUIRES: text box, text area, radio button group, checkbox group, drop down list and button
?>
		<p>"sup?" - Kaitlynn Anderson-Butcher, 2015</p>

		<h1>Configuration</h1>

		<form id="four" method="POST">
			First Name: <input type="text" name="somebody"/> <br />
			Last Name: <input type="text" name="lastname"/><br /><br />		

			Site theme: <br />
			<input type="radio" name="soap" value="minty"/> Minty (Green)<br />
			<input type="radio" name="soap" value="snowy"/> Snowy (Light Blue)<br />
			<input type="radio" name="soap" value="windy"/> Windy (Beige)<br />
			<input type="radio" name="soap" value="sunny"/> Sunny (Bright Yellow)<br />
			<input type="radio" name="soap" value="ruby"/> Ruby.rb<br />
			<input type="radio" name="soap" value="hellish"/> Hellish (Hellish)<br /><br />

			Game Configuration: <br />
			<input type="checkbox" name="c1" /> Auto-save <br />
			<input type="checkbox" name="c2" /> Participate in Leaderboards <br />
			<input type="checkbox" name="c3" /> Ramen <br /><br />

			Select Your Favorite Kind of Cookie:<br />
			<select name="cookie">
				<option>Chocolate Chip</option>
				<option>Ginger Snap</option>
				<option>Short Bread</option>	
				<option> Sugar Cookie</option>
				<option>The Java Script Kind</option>
				<option value="shame on your family">I don't like cookies</option>
			</select><br /><br />	

			<input type="submit" name="submit" value="Submit to D2L"/> <br /><br />
		</form>
		Comments and/or Feedback: <br />
		<textarea name="whocares" form="four"></textarea><br />
<?php
	}
?>

<?php
	function display_output_page(){
		echo "Saving config settings...<br />";
		if($_REQUEST["somebody"]){

			//names
			echo "Setting name to '".$_REQUEST["somebody"]."'...<br/>"
?>
			<script>
				var name = "<?php echo $_REQUEST["somebody"]; ?>";
				setCookie("name",name);
			</script>
<?php
			//an easter egg :3
			if($_REQUEST["somebody"] == "Victoria" || $_REQUEST["somebody"] == "Kait"){
				echo "Hello, lovely!<br/>";
			}
		}
		//checks if the theme was set
		if($_REQUEST["soap"]){
			echo "Setting theme to '".$_REQUEST["soap"]."'...<br />";
			//spits out javascript code to set the theme's cookie
?>
			<script>
				var theme = "<?php echo $_REQUEST["soap"]; ?>";
				setCookie("theme",theme);
			</script>
<?php
		}
		//other settings
		if($_REQUEST["c1"]){
			echo 'The cookies will now auto-save.<br />';
		}
		if($_REQUEST["c2"]){
			echo 'Your cookies will be pushed to leaderboards.<br />';
		}
		if($_REQUEST["c3"]){
			//a joke
			echo 'You clicked Ramen? Really?<br />';
		}

		//this is our cookie type survey
		if($_REQUEST['cookie']){
			$choice=$_REQUEST['cookie'];
			echo "You have selected $choice as your favorite cookie <br />";
		}	
		//complaint box response
		if($_REQUEST["whocares"]){
			echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/8o6c1UuoMwI?autoplay=1"" frameborder="0" allowfullscreen></iframe>';
		}
	
?>

<?php

	}//end function


?>




