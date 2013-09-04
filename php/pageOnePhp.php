<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Learning PHP </title>
	</head>

	<body id="blackColor">
		<div id="marginTop" class="box" onclick="window.location.href='../index.php'"><?php include "../menu.php";?></div>
			
		<div id="rightColumn" class="box"> </div>
		<div id="centre" class="box">
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
			echo("<br/> <br/>a multidimensional array is an array that has one or more array as its elements <br/> ");

			$multiDimensionArray = array("parentArray", array("secondArray", array("This is the first element of the thirdArray", "girl")));
			echo $multiDimensionArray[1][1][0];
			?>
			
			<br/><br/>
			"The concatenation operator in php is the dot '.'<br/>"; 
			"What do I do with that? I created a sentence " . "then separating it adding dots " . "and then will appear as one continuous string<br/><br/>";
			"By the way if you want to try out PHP on your computer and you are wondering why is not working, well there is a little trick. PHP is a 
			server side language, so it will not be interpreted by the browser. So you need to transform your pc into a server and in order to do that you 
			need to download XAMPP from
			<a href="http://www.apachefriends.org/">here<a/> <br/>
			<br/>Choose which one is the one for you, download and install. The php files go into the directory called htdocs. Once the file is there
			to see it into your browser you need to http://localhost/yourFileName.php"
			<br/><br/>
			We are now moving to variable scope. A scope is the area of the program where the variable is valid. So a local scope variable will be valid only on 
			the piece of code where it has been declared, ie in a for loop, while the global scope variables are valid all over the program. they can be useful but 
			properly because these span the all program and can be changed everywher you use them, then if a bug occurs it is difficult to track. 
			To declare a global scope variable inside your php program you need to prefix the declaration with the global keyword so that the declaration will
			look something like global $x=1;
			</br></br>
			There are also a type of variables called <a href="http://php.net/manual/en/reserved.variables.php">Predefined Variables<a/> 
			and those are always prefixed by the dollar sign and all always available in all the scopes. The link provided has examples and explanations on 
			what these are. 
			</br><br/>
			Let's move to constant, which are values that once defined cannot be changed by the program. The way to declare a constant is define("name of the constant","value");
			so if I declare define("FRANCESCO","I am the author of fc572.me"); and then I echo FRANCESCO run the code what it will print out is
			<?php
			define("FRANCESCO","I am the author of fc572.me");
			echo FRANCESCO;
			?>
			<br/>
			Let move into functions: These are snippets of code that I can confine together to perform a particular task;<br/>
			If I want to perform a task multiple times but with different values then I can use a function with parameters.<br/>
			For example function oneTwoThree($num1, $num2, $num3)<br/>
			{<br/>
			$total = $num1+num2+num3;<br/>
			return $total;<br/>
			}<br/>
			
			and then from somewhere in the program I call the function oneTwoThree(5,7,2) and echo its return value like this <br/>
			echo oneTwoThree(5,7,2);<br/>
			then I have the result of 14 displayed correctly.</br>
			Next I am going to touch on Forms and since these are important and can be an interesting subject to use selenium webdriver on,
			I am going to create a new page for it.
			</p>
			<div class="chapter"> 
				<div class="prev"> <a href="../index.php"> Previous </a> </div>
				<div class="next"> <a href="pageTwoPhp.php"> Next </a> </div>
			</div>
		</div>
		<div id="footer" class="box"><?php include "../commentsForm.php";?></div>
	</body>
</html>