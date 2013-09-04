<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Lesson Learned in HTML and CSS</title>
	</head>

	<body id="blackColor">
		<div id="marginTop" class="box" onclick="window.location.href='../index.php'"><?php include "../menu.php";?></div>
			
		<div id="rightColumn" class="box"> </div>
		<div id="centre" class="box">
		<strong> First Lesson </strong>
		<p>
			When using images, always, always, always spefify the height of the div container that is going to hold the picture.
			I had a this code %23marginTop%7B
						height: 100px;
						background-image: url(./images/fc572_Logo.png);
						background-repeat:no-repeat;
							%7D
		And I thought that having margin-top set would give me enough space to hold my image. Poor me. It took me a while to realize that 
		I have to get rid of margin-top and I had to use the height property in order for the picture to display.
		</p>
		
		<div class="chapter"> 
			<div class="prev"> <a href="index.php"> Previous </a> </div> 
			<div class="next"> <a href="pageTwo.php"> Next </a> </div>
		</div>
	</div>
		<div id="footer" class="box"><?php include "../commentsForm.php";?></div>
	</body>
</html>
