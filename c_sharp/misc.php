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

		<title> Configuration File</title>
	</head>
	
	<body id="backgroundColor" onload(hideElement())>
	<div id="wrapper">
		<div id="marginTop" onclick="window.location.href='../index.php'"><?php include "../menuIndex.php";?></div>
		<div id="rightColumn" class="box"><p> Twitter feed will go here </p> <div>Follow me on twitter @fc572</div></div>
		<div id="centre" class="box">
		<h2> Configuration File</h2>
			<p>
			One of the first things that annoys me is the need to deploy to the live environmmet in order to test the code
			that I have written. I need a test environmemnt! <br/>
			What better place than localhost to place my test environment? So I have downloaded and deployed the XAMPP server
			and I have installed my files in the htdocs directory.
			Once the server is up and running, I can point my code to the localhost. <br/>
			How annoying it is to change all the connection strings that there are in the code? Is there a better way? Of course there is 
			and it is the app.config file. This file stores values in the name-value pair format and then from within the code you can use
			the property name in order to retrieve the value set.<br/>
			In order to use the app.config file, I have inserted a new XML file in the root directory of my project (could/should be in a newly created 
			app setting folder but for now it is ok like this) and then I have changed the code slighly.
			This is how the app.config file looks like;
			<textarea readonly rows=10 cols=95><br/>
&lt;?xml version="1.0" encoding="utf-8" ?&gt;
&lt;configuration&gt;
&lt;connectionStrings&gt;
	&lt;add name="environment" connectionString="http://localhost/fc572" /&gt;
	&lt;!--add name="environment" connectionString="http://www.fc572.me" /--&gt;
	&lt;/connectionStrings&gt;
	&lt;/configuration&gt;
	</textarea>
	<br/>
			And this is how the code from within the app looks like <br/>
			<textarea readonly rows=5 cols=95>
	System.Configuration.ConnectionStringSettings connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["environment"];
		driver.Navigate().GoToUrl(connectionString + "/c_sharp/pageTwoCs.php");
			</textarea>
			<br/>
			Now all I have to do is to comment/uncomment the environment that I want to use and this change will reflect all over the place.
		</p>
		
		</p>
				<div class="linkButtonLeft"> <a href="../blog/pageOneBlog.php"> Prev </a> </div> 
				<div class="linkButtonRight"> <a href="pageOneCs.php"> Next </a> </div>
		</div><!--centre-->
		
		<!--input id="submit" type="button" value="Show comments" onclick="toggleElement()"></input-->
		
		<div id="showHide"> <?php include "../commentsForm.php";?> </div>	
	</div> <!--wrapper-->	
	</body>
</html>
