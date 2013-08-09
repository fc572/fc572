<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Learning PHP </title>
	</head>

	<body>
	<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> PHP </strong>
		<p>
		
	<?php

		echo "Hello PHP <br/>";

		$variable = "To declare a variable use the $ (sigil) sign in front of the name <br/>";
		echo $variable;
		
		$numbers = array(1,2,3,4,5);
		echo "I have an array with 5 numbers and "."I am printing the 4th element of the array ".$numbers[3];
		echo("<br/><br/>");
		
		echo("An associative array is an array that has a value on the left and one of the right of the => sign. While you'll
		call the value on the left of => you'll see the value on the right of =>.<br/>So far I am puzzled why PHP needs such array<br/>");
		$associativeArray = array("associative arrays"=>"The output of an associative array is the value on the right of the =>");

		echo $associativeArray["associative arrays"];
echo("<br/> <br/>a multidimension array is an array that has one or more array as its elements <br/> ");

		$multiDimensionArray = array("parentArray", array("secondArray", array("This is the first element of the thirdArray", "girl")));
		echo $multiDimensionArray[1][1][0];
echo("<br/><br/>");
		echo "The concatenation operator in php is the dot '.'<br/>"; 
		echo "What do I do with that? I created a sentence " . "then separating it adding dots " . "and then will appear as one continous string<br/><br/>";
		echo "By the way if you want to try out PHP on your computer and you are wondering why is not working, well there is a little trick. PHP is a 
		server side language, so it will not be interpreted by the browser. So you need to transfor your pc into a server and in order to do that you 
		need to download XAMPP from " ?> <a href="http://www.apachefriends.org/">here<a/> <br/>
		<?php
		echo "<br/>Choose which one is the one for you, download and install. The php files go into the directory called htdocs. Once the file is there
		to see it into your browser you need to http://localhost/yourFileName.php"
		?>
		<br/><br/>
		<?php>
		echo"We are now moving to variable scope. A scope is the area of the program where the variable is valid. So a local scope variable will be valid only on 
		the piece of code where it has been declared, ie in a for loop, while the global scope variables are valid all over the program. they can be useful but 
		properly because these span the all program and can be changed everywher you use them, then if a bug occurs it is difficult to track. 
		To decalare a global scope variable inside your php program you need to prefix the decalration with the global keyword so that the decalration will
		look something like global $x=1; "
		?> </br></br>
		<?php>
		echo"There are also a type of vaiables called" ?> <a href="http://php.net/manual/en/reserved.variables.php">Predefined Variables"<a/> 
		<?php>
		echo""
		?>
		
</p>
<div class="chapter"> <div class="prev"> <a href="../index.php"> Previous </a> </div> <div class="next"> <a href=""> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>