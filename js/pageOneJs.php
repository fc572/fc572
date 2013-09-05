<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Learning Javascript </title>
	</head>

	<body id="blackColor">
		<div id="marginTop" class="box" onclick="window.location.href='../index.php'"><?php include "../menu.php";?></div>
			
		<div id="rightColumn" class="box"> </div>
		<div id="centre" class="box">
		<strong> Javascript </strong>
		<p>
		<script type="text/javascript">
			document.write("How to declare variables in js");
			document.write("<br/>");
			document.write("var saySomething = I want to start from zero;<br/>");
			
			document.write("This is simply how to declare variables and how to use js directly into the body of the HTML code<br/>");
			document.write("The problem is that you do not want js and HTML in the same file. So from next page I'll split the two");
		</script>
		<p/>		
		<div class="chapter"> 
			<div class="prev"> <a href="../index.php"> Previous </a> </div> 
			<div class="next"> <a href="pageTwoJs.php"> Next </a> </div>
		</div>
	</div>
	<div id="footer" class="box"><?php include "../commentsForm.php";?></div>
	</body>
</html>