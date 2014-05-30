<?php include "../templates/top.php"?>

		<h2> Configuration File</h2>
			<p>
At the start of this little project I did not have a test environment, so I had to test all my code in the “production” environment which as a tester by trade I should have avoided from day -1! Beside that I find really annoying to deploy to the live environmmet in order to test the code that I have written, because my code is really buggy so it takes me long time to fix/deploy/fix/deploy. I need a test environmemnt! <br/>

I have decided to have my test environment on my machine, so first thing to do is to give it capabilities as a server. To do that I have downloaded and deployed the XAMPP server and I have installed my files in the htdocs directory.
Once the server is up and running, I can run my code to the localhost. <br/> 

But now every time I want to test I need to change all the connection strings to point to my localhost and then I need to re-point to my prod environment.
How annoying it is to change all the connection strings that there are in the code? Is there a better way? Of course there is and it is the app.config file. This file stores values in the name-value pair format and then from within the code you can use the property name in order to retrieve the value set.<br/>
In order to use the app.config file, I have inserted a new XML file in the root directory of my project (could/should be in a newly created app setting folder but for now it is ok like this) and this is how the app.config file looks like;
<textarea readonly rows=10 cols=95><br/>
&lt;?xml version="1.0" encoding="utf-8" ?&gt;
&lt;configuration&gt;
   &lt;connectionStrings&gt;
	 &lt;add name="test" connectionString="http://localhost/fc572" /&gt;
	 &lt;add name="live" connectionString="http://www.fc572.me" /&gt;
   &lt;/connectionStrings&gt;
&lt;/configuration&gt;
	</textarea>
	<br/>
And this is how the code that uses the app.config file from within the app looks like <br/>
<textarea readonly rows=5 cols=95>
System.Configuration.ConnectionStringSettings connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["test"];
</textarea>
<br/>
Now all I have to do is to toggle test/live in the code to choose which environment I want to use and this change will reflect all over the place.</br>
</p>
</p>
<!--div class="linkButtonLeft"> <a href="PREV_PAGE_GOES_HERE"> Prev </a> </div--> 
	<div class="linkButtonRight"> <a href="pageOneCs.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>


