<?php include "../templates/top.php"?>

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
		
			</textarea>
			<br/>
			Now all I have to do is to comment/uncomment the environment that I want to use and this change will reflect all over the place.
		</p>
		
		</p>
	<!--div class="linkButtonLeft"> <a href="PREV_PAGE_GOES_HERE"> Prev </a> </div--> 
	<div class="linkButtonRight"> <a href="pageOneCs.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>


