<!DOCTYPE html> 
<html>
	<head>
		<meta name="description" content="My experience with webDriver">
		<meta name="keywords" content="webDriver, C#, Java, selenium, fc572" />
		<meta name="author" content="Francesco"/>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="../jsCommentHelper.js"></script>

		<title> Page Three C# </title>
	</head>
	
	<body id="backgroundColor" onload(hideElement())>
	<div id="wrapper">
		<div id="marginTop" onclick="window.location.href='../index.php'"><?php include "../menuIndex.php";?></div>
		<div id="rightColumn" class="box"><p> Twitter feed will go here </p> <div>Follow me on twitter @fc572</div></div>
		<div id="centre" class="box">
		<h2>  CSS selectors continued </h2>
			<p>
		
		So that was some code to identify some elements on a web page. <br/> I want to re-iterate that the code barely does what it should do and
		it should not be used on a commercial product. Doind more of the same, I will now go on and try some advanced techniques ffor the CSS 
		selectors.<br/>
		The first one that I want to explore is findElement by relentionship. It is like finding Prince Henry not by name but by saying "I am looking
		for the second child of Prince Charles"). Same thing.<br/>
		Below I have inserted a form with three fields called input to demonstrate the concept.As usual the code follows below.<br/>
		<form id="inputForm">
			<input id="iAmTheFirstInput" type="text" size="35"/>  
			<input id="iAmTheSecondInput" type="text" size="35"/> 
			<input id="iAmTheThirdInput" type="text" size="35"/> 
		</form>
			
		</p>
				<div class="linkButtonLeft"> <a href="pageTwoCs.php"> Prev </a> </div> 
				<div class="linkButtonRight"> <a href="NEXT_PAGE_GOES_HERE"> Next </a> </div>
		</div><!--centre-->
		
		<!--input id="submit" type="button" value="Show comments" onclick="toggleElement()"></input-->
		
		<div id="showHide"> <?php include "../commentsForm.php";?> </div>	
	</div> <!--wrapper-->	
	</body>
</html>
