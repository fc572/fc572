<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> Experiencing webDriver in Java</title>
	</head>

	<body id="blackColor">
		<div id="marginTop" class="box" onclick="window.location.href='../index.php'"><?php include "../menu.php";?></div>
			
		<div id="rightColumn" class="box"> </div>
		<div id="centre" class="box">
		<strong> Let's get set up in an open source environment. </strong>
			<p>
			So the first thing I did to set open source is to download this <a href="https://www.virtualbox.org/wiki/Downloads"> virtualBox </a>
			from Oracle in order to then set up Linux Mint on my windows machine. It can be found <a href="http://www.linuxmint.com/download.php">here</a>
			I have download the 13.04 version (32 bit)<br/>
			After I have set up my Virtual machine running Mint, I have to install Maven2, IntelliJ, JUnit on that machine.<br/>
			Once the set up is completed....
			I have not installed JUnit as it can be added to the project using maven.
			There is one thing to know about maven and it is the POM.xml file. This file will hold all the references to the 
			dependencies of your project. So for JUnit it will be something like ...<br/>
			<textarea readonly rows=10 cols=95>
&lt;dependencies&gt;
	&lt;dependency&gt;
		&lt;groupId&gt;junit&lt;/groupId&gt;
		&lt;artifactId&gt;junit&lt;/artifactId&gt;
		&lt;version&gt;4.8.1&lt;/version&gt;
		&lt;scope&gt;test&lt;/scope&gt;
	&lt;/dependency&gt;
&lt;/dependencies&gt;</textarea><br/>
			Once I am done with the set up and I have my first running test, I straight away know that I need to set up a test environment
			and I need a config file to switch between envs as I have done in C#.<br/>
			So I have download XAMPP from <a href="http://www.apachefriends.org/en/xampp-linux.php">here</a> and installed on my Linux machine.
			I have then set up a configuration file in my project so that I can switch environment at will.
			I have also set a project in gitHub so that I can transfer the website code from my virtual machine to my real machine using a
			method that is over-engineered for my needs, but it mirrors what happens in real life<br/>
			The configuration file gets added to the root of the project and it is read into the application using this code
			<textarea readonly rows=10 cols=95>
		public class Helper {

		    protected static String getUrl(){
			Properties prop = new Properties();
			try {
			    prop.load(new FileInputStream("environment.config"));
			} catch (IOException e) {
			    e.printStackTrace();
			}
			return prop.getProperty("environment_TEST");
		    }
		}
			</textarea><br/>
			Now that I have the environment set up, I can start with locating the DOM elements on the page using Java and webDriver.
			</p>
		
		<div class="chapter"> 
			<div class="prev"> <a href="../index.php"> Previous </a> </div> 
			<div class="next"> <a href="pageTwoJava.php"> Next </a> </div>
		</div>
	</div>
	<div id="footer" class="box"><?php include "../commentsForm.php";?></div>	</body>
</html>
