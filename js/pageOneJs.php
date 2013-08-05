<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Learning Javascript </title>
	</head>

	<body>
	<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> Javascript </strong>
		<p>
		<script type="text/javascript">
			document.write("How to declare variables in js");
			document.write("<br/>");
			document.write("var saySomething = I want to start from zero");
			document.write("<br/>");
			var saySomething = "I want to start from zero";
			document.write("<br/>");
			document.write(saySomething);
			document.write("This is simply how to declare variables and how to use js directly into the body of the HTML code");
			document.write("problem is that you do not want js and HTML in the same file. So from next page I'll split the two");
		</script>
		<p/>		
		<div class="chapter"> <div class="prev"> <a href="../index.php"> Previous </a> </div> <div class="next"> <a href="pageTwoJs.php"> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>