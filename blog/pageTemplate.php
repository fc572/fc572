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

		<title> Blogs will come! </title>
	</head>
	
	<body id="backgroundColor" onload(hideElement())>
	<div id="wrapper">
		<div id="marginTop" onclick="window.location.href='../index.php'"><?php include "../menuIndex.php";?></div>
		<div id="rightColumn" class="box"><p> Twitter feed will go here </p> <div>Follow me on twitter @fc572</div></div>
		<div id="centre" class="box">
		<h2> Page Heading </h2>
			<p>
			CONTENT_GOES_HERE</br>
			</p>
				<div class="linkButtonLeft"> <a href="PREV_PAGE_GOES_HERE"> Prev </a> </div> 
				<div class="linkButtonRight"> <a href="NEXT_PAGE_GOES_HERE"> Next </a> </div>
		</div><!--centre-->
		
		<!--input id="submit" type="button" value="Show comments" onclick="toggleElement()"></input-->
		
		<div id="showHide"> <?php include "../commentsForm.php";?> </div>	
	</div> <!--wrapper-->	
	</body>
</html>
