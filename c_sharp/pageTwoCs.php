<?php include "../templates/top.php"?>

		<h2> Let's start locating elements</h2>
<p>So I am all set up with my IDE, NUnit and webDriver, and now I am ready to start targeting my website.</p>
<p>
In order to use web automation, first thing we need to worry about is to find the DOM element that we want to act upon.	WebDriver offers various ways to locate an element on the page, and I am now going to create a list of fields in this page where I can easily demonstrate the use of FindElement and FindElements methods. <br/>
The elements that I am looking for are enclosed in a dotted line<br/>
<form class=”noFormat”>
Element By Id <input class="addBorder" type="text" size="35" id="FindMeById"/><br>
Element By name: <input class="addBorder" type="text" size="35" name="FindMeByName"/>
</form>
<br/>
<div class="findMeByClassName addBorder"> Find me by class name </div><br/>
<div><a class="addBorder" href="../pagetestLink.php">FindMeByLinkText</a> This links to a test page </div><br/>
<div><a class="addBorder" href="../pagetestLink.php">FindMeByPartialLinkText</a> This links to a test page, again </div><br/>
<div class="addBorder" id="findMeByCssSelector"> Find me by Css Selector </div>
<br/>
<div class="addBorder">	
Also because Css Selectors are a lot, see 
<a href="http://www.w3schools.com/cssref/css_selectors.asp"> here <a/>
I am going to add a list and check boxes and radio buttons that are the most likely you'll find on a web page <br/>
				<ul>
					<li> First element</li>
					<li> Second element</li>
					<li> Third element</li>
				</ul>
			</div>
			<br/>
			Also to be able to hand pick one check box only, I am going to use XPath in the second example for checkboxes, and I am going 
			to use only XPath for selecting a radio button. I think that XPath will deserve a better coverage than that, but for now it is going 
			to be OK like that.
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
		</p>	
		<p>
		Now that the form is done, I need to generate the code in my project to find the elements on the page and to act on them.<br/>
		<strong> Note that this code does barely what it is supposed to do. There is no error handling, no abstraction for common functions,
		and none of the other code practises. Also it is not formatted correctly as I am learning how to style the code properly</strong>
		<br/><br/>
		<textarea readonly rows=20 cols=95><br/>
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
	public class PageTwo
	{
		IWebDriver driver;

		[TestFixtureSetUp]
		public void TestSetUp()
		{
			// set up the driver to use a browser
			driver = new FirefoxDriver();
		}

		[Test]
		public void TestPageTwo()
		{
			System.Configuration.ConnectionStringSettings connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["environment"];
			driver.Navigate().GoToUrl(connectionString + "/c_sharp/pageTwoCs.php");
			driver.Manage().Timeouts().ImplicitlyWait(new TimeSpan(0, 0, 15));

			//on the page find the element that represent the search box

			IWebElement findById = driver.FindElement(By.Id("FindMeById"));
			findById.SendKeys("I have found you by Id!");

			IWebElement findByname = driver.FindElement(By.Name("FindMeByName"));
			findByname.SendKeys("I have found you by Name!");
				
			//this one did not work. Always caused element not found exception
			//ERROR//IWebElement findByClass = driver.FindElement(By.ClassName("FindMeByClassName"));
			//I then changed to this and the element was found
			//I think this happens because a class can have multiple elements on a page, so a list is 
			//better suited to host all of them - Yes, No Maybe.
			IList<IWebElement> findByClass = driver.FindElements(By.ClassName("FindMeByClassName"));
			// code to be fixed //Assert.True (findByClass. Contains("Find me by class name")); 
<br/		//find a link element by the text of the link
			IWebElement findMeByLinkText = driver.FindElement(By.LinkText("FindMeByLinkText"));
			findMeByLinkText.Click();

			driver.Manage().Timeouts().ImplicitlyWait(new TimeSpan(0, 0, 10));

			IWebElement findGoBackLink = driver.FindElement(By.LinkText("link"));
			findGoBackLink.Click();
						
			//find a link element using some of the text on the link
			IWebElement findMeByPartialLinkText = driver.FindElement(By.PartialLinkText("FindMeByPartial"));
			findMeByPartialLinkText.Click();

			driver.Manage().Timeouts().ImplicitlyWait(new TimeSpan(0, 0, 10)); //code repetition

			findGoBackLink = driver.FindElement(By.LinkText("link"));//code repetition
			findGoBackLink.Click();//code repetition

			IList<IWebElement> findByCssSelector = driver.FindElements(By.CssSelector("ul li"));
			foreach (IWebElement element in findByCssSelector) 
			{
				Console.WriteLine(element.Text);
			}

			IList<IWebElement> findCheckBox = driver.FindElements(By.Id("vehicle"));
			foreach (IWebElement element in findCheckBox) //if I want to check all the boxes
			{
				if (!element.Selected)
				{
					element.Click(); //select the elements
				}
			}

			//Using XPath is a slower method but allows to hand pick your elements from the page
			//XPath is case sensitive - 
			IWebElement findThatCheckBox = driver.FindElement(By.XPath("//input[@type='checkbox'][@value='MotoBike']"));
			if (!findThatCheckBox.Selected)
			{
				findThatCheckBox.Click();
			}

			IList<IWebElement> findRadioButtons = driver.FindElements(By.Name("feetFunction"));
			foreach(IWebElement element in findRadioButtons)
			{
				if(element.GetAttribute("value").Equals("Run"))
				{ //Equals is also case sensitive
					if(!element.Selected)
					{
						element.Click();
					}
				}
			}
		}
		
		[TestFixtureTearDown]
		public void FixtureTearDown()
		{
			// shut down driver and free memory
			driver.Quit();
		}
	}
}</textarea>
		
		<br/>
		<br/>
		Ok so if you run this code in NUnit it will be all nice and green, so it is doing what I want it to do. Later we are going to reformat this 
		code to make it prettier and more functional, but for the time being I am happy with it as it is. 
		</p>
				<div class="linkButtonLeft"> <a href="pageOneCs.php"> Prev </a> </div> 
				<div class="linkButtonRight"> <a href="pageThreeCs.php"> Next </a> </div>
		</div><!--centre-->
		
<?php include "../templates/bottom.php"?>
