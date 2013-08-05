<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> I Know Nothing </title>
	</head>

	<body>
	<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> Configuration File </strong>
		
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
			This is how the app.config file looks like;<code><br/>
			&lt;?xml version="1.0" encoding="utf-8" ?&gt;<br/>

			&lt;configuration&gt;<br/>
			  &lt;connectionStrings&gt;<br/>
				&lt;add name="environment" connectionString="http://localhost/fc572" /&gt;<br/>
				&lt;!--add name="environment" connectionString="http://www.fc572.me" /--&gt;<br/>
			  &lt;/connectionStrings&gt;<br/>
			&lt;/configuration&gt;<br/>
			</code><br/>
			And this is how the code from within the app looks like <br/>
			<code>
				System.Configuration.ConnectionStringSettings connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["environment"];
			<br/>
            driver.Navigate().GoToUrl(connectionString + "/c_sharp/pageTwoCs.php");<br/>
			</code>
			<br/>
			Now all I have to do is to comment/uncomment the environment that I want to use and this change will reflect all over the place.
		</p>
		
		<div class="chapter"> <div class="prev"> <a href="../index.php"> Previous </a> </div> <div class="next"> <a href="pageOneCs.php"> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>