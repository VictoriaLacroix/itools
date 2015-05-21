<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lab Tree</title>
	</head>
	<body>
		<?php
			if($_REQUEST["hours"]>0 && $_REQUEST["hours"]<200 && $_REQUEST["wage"]>=11 && $_REQUEST["wage"]<1000){
				$hours = $_REQUEST["hours"];	
				$wage = $_REQUEST["wage"];
				if($hours > 40){
					echo "40hrs @ $".$wage."/hr = $".$hours*$wage."<br />";
					$bonus=(($hours-40)*($wage*1.5));
					echo ($hours-40)."hrs overtime @ $".($wage*1.5)."/hr = $".$bonus.'<br />';
					echo "total= $".(($hours*$wage)+$bonus).'<br />';
				}else{
					echo $hours."hrs @ $".$wage."/hr = $".$hours*$wage."<br />";
				}
				echo '<a href="'.$_SERVER["script_name"].'">Do moar</a>';
				
			}else{
				echo '<form method="POST">
					
					Hours Worked:			
					<input type="text" name="hours"><br/>
					Hourly Wage (min 11):
					<input type="text" name="wage"><br/>
					<input type="reset" name="Clear Form">
					<input type="submit" name="Submit Form">
				</form>';
			}
		?>
	</body>
</html>
