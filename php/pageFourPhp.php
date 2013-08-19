<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> PHP API </title>
	</head>

	<body>
		<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> API in PHP </strong>
		<p>
		In this page I am going to write a RESTful API to retrieve the values inserted into the comments form.<br/>
		To do that I am thinking to use the value inserted into the your_Key as a kind of password to retrieve your record so without this 
		information there will be no records returned. Also the formatting will be json so that we can use it later on with javascript and the likes.
		I don't know yet how but I'll think of something.
		<br/>
		So for now let's concentrate on the API.
		<br/>
		API is the acronym for Application Programming Interface. Think of an interface as a place that connects two different things. For example
		a train station is an interface between the train and the road. And as there are rules to access the train station, so there are rules in 
		the API. So this combination of rules and connection makes your program available to external sources. This is what I am going to do; An interface between
		the database and the webPage that requires information.<br/>
		In order to write an API I need to create a new file api.php and put it on my web-server. This is the file that will be accessible from outside.
		Having read few things on the web I have now the following map to go about<br/>
		<ol>
			<li> Accept the input that comes from the outside</li>
			<li> Process the input by retrieving record from DB</li>
			<li> Return results</li>
		</ol>
		What I have also done is to create the API so that if send the URI http://www.fc572.me/php/api.php?your_key={your_key} then it will return the comment that 
		you have been inserted in the previous form. If the URI http://www.fc572.me/php/api.php?your_key=fc572&requestingStatus=200 then the API will return 
		the description of the code you have requested alongside the numerical value.
		
		</p>
		
		<div class="chapter"> <div class="prev"> <a href="pageThreePhp.php"> Previous </a> </div> <div class="next"> <a href=".php"> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>