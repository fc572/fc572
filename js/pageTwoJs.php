<?php include "../templates/top.php"?>
		<strong> Javascript </strong>

		<p>
		So I have at the top of this file declared that the source for the javascript is a file called script.js (I know
		I have imagination!). The syntax is as follows: 
		<br/>
		<textarea readonly rows=1 cols=95>
		&lt;script type="text/javascript" src="myScript.js"&gt;&lt;/script&gt;
		</textarea><br/>
		So from now on all the js that you'll see on this page will come from the external file myScript.js referenced above<br/><br/>
		
			<div id="insertJsHere"> This text will change </div><br/>
			
			<!--button id="buttonJsToPress" onclick="externalFunc()">Press me to call content from myScript.js file</button><br/-->
			<button id="buttonJsToPress">Press me to call content from myScript.js file</button>
			
			The button and the text above are displayed using this code<br/>
			<textarea readonly rows=3 cols=95>
&lt;button id="buttonJsToPress" onclick="externalFunc()"&gt;Press me to call content from myScript.js file&lt;/button&gt;
&lt;div id="insertJsHere"&gt; This text will change &lt;/div&gt;<br/>
			</textarea><br/>
			Now if I want to test that this all works using Webdriver with C# I'll do the following<br/>
			<textarea readonly rows=20 cols=95>
	using System;
	using System.Collections.Generic;
	using System.Linq;
	using System.Web;
	using OpenQA.Selenium.Firefox;
	using OpenQA.Selenium;
	using NUnit.Framework;

	namespace mySeleniumDisaster
	{
		[TestFixture]
		public class pageTwoJs
		{
			IWebDriver driver;

			[TestFixtureSetUp]
			public void TestSetUp()
			{
				// set up the driver to use a browser
				driver = new FirefoxDriver();
			}
					
			[Test]
			public void TestPageTwoJs()
			{
				System.Configuration.ConnectionStringSettings connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["environment"];
				driver.Navigate().GoToUrl(connectionString + "/js/pageTwoJs.php");
				driver.Manage().Timeouts().ImplicitlyWait(new TimeSpan(0, 0, 15));

				Assert.True(driver.Title.Equals("Learning Javascript"));

				IWebElement textToChange = driver.FindElement(By.Id("insertJsHere"));
				Assert.True(textToChange.Text.Equals("This text will change"));

				IWebElement button = driver.FindElement(By.Id("buttonJsToPress"));
				button.Click();

				textToChange = driver.FindElement(By.Id("insertJsHere"));
				Assert.True(textToChange.Text.Equals("This text has been modified from the myScript.js file"));
			}

			[TestFixtureTearDown]
			public void FixtureTearDown()
			{
				// shut down driver and free memory
				driver.Quit();
			}
		}
	}
			</textarea><br/>
			It is a very simple test that it finds the page, verify it is the right one and then verifies the text of the div element before 
			and after the button has been clicked.<br/>
		</p>
		
				<div class="linkButtonLeft"> <a href="pageOneJs.php"> Prev </a> </div> 
				<!--div class="linkButtonRight"> <a href="PAGE GOES HERE"> Next </a> </div-->
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
