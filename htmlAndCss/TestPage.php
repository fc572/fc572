<?php include "../templates/top.php"?>

<html>
<head>
<title>
	Web page for testing
</title>
</head>	

<p>Elements to be found are on this page and I hope self-explanatory</p>
<form>
				Find Element By Id <input class="addBorder" type="text" size="35" id="FindMeById"/><br>
				Find Element By name: <input class="addBorder" type="text" size="35" name="FindMeByName"/>
			</form>
			
			<br/>
			
			<div class="findMeByClassName addBorder"> Find me by class name </div><br/>
			<div><a class="addBorder" href="../pagetestLink.php">FindMeByLinkText</a> This links to a test page </div><br/>
			<div><a class="addBorder" href="../pagetestLink.php">FindMeByPartialLinkText</a> This links to a test page, again </div><br/>
			<div class="addBorder" id="findMeByCssSelector"> Find me by Css Selector </div>
			<br/>
			<div class="addBorder">	
				Because Css Selectors are a lot, see <a href="http://www.w3schools.com/cssref/css_selectors.asp"> here in the W3schools website <a/>
			
				I am going to add a list, check boxes and radio buttons that are the most likely you'll find on a web page <br/>
				<ul>
					<li> First element</li>
					<li> Second element</li>
					<li> Third element</li>
				</ul>
			</div>
			<br/>
			I am going to use XPath in the second example for check boxes and I am going 
			to use only XPath for selecting a radio button. I think that XPath will deserve a better coverage than that, but for now 				it is going to be OK like that.
			<br/>
			<div class="addBorder">
				Check box: 
				<form>
					<input type="checkbox" id="vehicle" value="MotoBike"> My Bike is the fastest <br/>
					<input type="checkbox" id="vehicle" value="Car"> My Car is the slowest <br/>
				</form>
			</div>	
			<br/>
			<div class="addBorder">
				 Radio buttons: 
				<form>	
					<input type="radio" name="feetFunction" value="Walk"> I like to walk <br/>
					<input type="radio" name="feetFunction" value="Run">  I like to run <br/>
				</form>
			</div>

</html>
