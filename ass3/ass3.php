<?php
//create variables 
$host="coscvm1.cs.laurentian.ca";
$userName="generalUser";
$passcode="omg";
$database="settings";

//Connect to database
global $con;
$con=new mysqli($host,$userName,$passcode,$database);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<title>Assignment 3</title>
		<script src="/global.js"></script>
	</head>
	<body onload="setup()">
		<div class="navbar">
     		<?php
     			include $_SERVER['DOCUMENT_ROOT']."sidebar.php";
			?>
		</div>
		<?php
			//Kait, ya gotta use multiple divs as shown here
		?>
		<div class="content">
			<div>					
				<?php
					if(isset($_REQUEST['submit'])){
						display_output_page();
					}
					if(isset($_REQUEST['database'])){

						display_database_output();
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
			<input type="radio" name="soap" value="ruby"/> Ruby.rb (Dark Red)<br />
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

			<input type="submit" name="submit" value="Submit to D2L"/>
			<input type="submit" name="database" value="Current Settings"><br /><br />
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
			echo "Setting name to '".$_REQUEST["somebody"]."'...<br/>"
?>
			<script>
				var name = "<?php echo $_REQUEST["somebody"]; ?>";
				setCookie("name",name);
			</script>
<?php
			if($_REQUEST["somebody"] == "Victoria" || $_REQUEST["somebody"] == "Kait"){
				echo "<br />Hello, lovely!<br/>";
			}
		}
		if($_REQUEST["soap"]){
			echo "Setting theme to '".$_REQUEST["soap"]."'...<br />";
?>
			<script>
				var theme = "<?php echo $_REQUEST["soap"]; ?>";
				setCookie("theme",theme);
			</script>
<?php
		}
		if($_REQUEST["c1"]){
			echo 'The cookies will now auto-save.<br />';
		}
		if($_REQUEST["c2"]){
			echo 'Your cookies will be pushed to leaderboards.<br />';
		}
		if($_REQUEST["c3"]){
			echo 'You clicked Ramen? Really?<br />';
		}

		if($_REQUEST['cookie']){
			$choice=$_REQUEST['cookie'];
			echo "You have selected $choice as your favorite cookie <br />";
		}	

		if($_REQUEST["whocares"]){
			echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/8o6c1UuoMwI?autoplay=1"" frameborder="0" allowfullscreen></iframe>';
		}
	
?>


<?php
//insert values into table
//create variables
$host="coscvm1.cs.laurentian.ca";
$userName="generalUser";
$passcode="omg";
$database="settings";  
//Connect to database
//global $con;
$con=new mysqli($host,$userName,$passcode,$database);


if(isset($_REQUEST['submit'])){
	
	//set names
	if(isset($_REQUEST["somebody"])&&($_REQUEST["lastname"])){
		$somebody=$_REQUEST["somebody"];
		$lastname=$_REQUEST["lastname"];
		$c1=$_REQUEST["c1"];
		$c2=$_REQUEST["c2"];
		$c3=$_REQUEST["c3"];
		$cookie=$_REQUEST["cookie"];
		$sql="INSERT INTO `preferences` VALUES('".$somebody."','".$lastname."','".$cookie."','".$c1."','".$c2."','".$c3."')";		
//		echo"$con";
		if($con->query($sql)===TRUE){
			echo"FINALLY";			
			}
		else{
 	
			echo"you messed up :T";
			}		
	}	

	else{ 
		echo"No New Changes";
		}
}


?>
<?php

	}//end function
	$con->close();
?>


<?php function display_database_output(){
$host="coscvm1.cs.laurentian.ca";
$userName="generalUser";
$passcode="omg";
$database="settings";
//Connect to database
//global $con; 
$con=new mysqli($host,$userName,$passcode,$database);

  if($con->connect_errno){
           echo "Connection Failed: ".$link->linkect_errno;
                        }
else {echo"Settings for Everyone";}

//insert into table

$result=mysqli_query($con,"SELECT * FROM preferences"); 
echo"<table>";
		echo"<tr><td>First Name</td><td>Last Name</td><td>Cookie</td><td>Auto Save</td><td>Participate in Leader Boards</td><td>Ramen</td></tr>";

//go through each row individually
while($row=mysqli_fetch_array($result)){
	echo"<tr>";
	echo"<td>" . $row['firstName'] . "</td>";
	echo"<td>" . $row['lastName'] . "</td>";
	echo"<td>" . $row['cookie'] . "</td>";
	echo"<td>" . $row['save'] . "</td>";
	echo"<td>" . $row['lead'] . "</td>";
	echo"<td>" . $row['ramen']. "</td>";
	echo"</tr>";
}		
echo"</table>";
echo"<a href=http://coscvm1.cs.laurentian.ca/ass3/ass3.php>Back</a>";
mysqli_close($con);


	}//end function




?>

