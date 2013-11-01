<?php include "../templates/top.php"?>

		<h2> So here I am. Let's start with installing and running IDE of choice</h2>
			<p>
		Well I want to be able to do this in both c# and java, so I am going to do everything twice.<br/>
		Let's start with C# for which we need to install <a href="http://www.microsoft.com/visualstudio/eng/downloads"> Visual studio Express </a>
		where I choose Visual Studio Express 2012 for Web. Why this one? because it seems the most relevant since I am going to use selenium web driver.
		There is the word web in both, I take this as a clue.<br/>
		I have already installed this following the wizard, so no big surprises there. Now I am off to the selenium website in order
		to find what I need to make selenium work with visual studio.<br/>
		One of the things that I have found almost always together is that wheever I want C# and Selenium, NUnit most often than not shows 
		in my searches. So what is it? As I understand it, Nunit is a framework for testing .net apps. What does that mean. If on google I do
		"define: Framework", this is definition that I like best "A basic structure underlying a system". <br/> So NUnit allows me to use certain functionalities
		like beign able to run a test without a Main() function and/or to report on those tests and to make the NUnit going trough my code and
		finding all the tests that there are. I can then run them all together or one at the time. So I see NUnit as a very good plug in to Visual studio.
		<br/>
		So I am downloading NUnit from their <a href="http://www.nunit.org/index.php?p=download"> download page </a>
		I am also going to download the C# driver from <a href "http://docs.seleniumhq.org/download/"> selenium download page </a>
		<br/>
		So now I have downloaded Selenium web driver "Language Client Version" C#, NUnit and Visual Studio 2012 Web
		<br/>
		I am opening Visual Studio and I click on New Project. I go to templates and then Visual C#. I am presented with is a dilemma; Which kind of project should I choose?
		<br/>
		The list is quite long, and that Test tab looks promising, but I do not want to run unit tests, I want something more functional, so I go for the 
		empty web application. I name it mySeleniumDisaster and then I click OK. <br/>
		Once the project is created, I know that I need to add NUnit and Web driver references to the project, so in solution explorer I click on the References
		actually right click and I go on to add NUnit and webDriver dlls.<br/>
		After adding the references I go and right click on seleniunDisaster and after choosing Add from the manu I select New item. I then go to 
		code and click on class.<br/>
		A skeleton class is open for me, but I need to do something with this. So I succumb to the dummest example, but I have to make sure that the set up works,
		so I am going to search something on...bing! <br/>
		So first things first. I have a class, now I need a method to make this class do something. But even before that, in order to user some of the feature
		from NUnit, I have to use some magic words like [TestFixture][TestFixtureSetUp][Test] and [TestFixtureTearDown]
		What are those? Test Fixture (in my head) is like saying to the machine "hey! This is going to be a test, so better run this code as it is", otherwise
		the pc goes all clever and wants a main method somewhere. The TestFixtureSetUp, Test and TestFixtureTearDown are what is says on the tin. Set up, Test and 
		destroy the test to free memory and kill all that is left hanging from this test before this machine mis-behave.<br/>
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
    public class DisasterOne
    {
        IWebDriver driver;

        [TestFixtureSetUp]
        public void TestSetUp()
        {
            // set up the driver to use a browser
            driver = new FirefoxDriver();
        }

        [Test]
        public void TestDisaster()
        {
            driver.Navigate().GoToUrl("http://www.bing.com");

            //on the page find the element that represent the search box

            IWebElement searchBox = driver.FindElement(By.Id("sb_form_q"));
            searchBox.SendKeys("ssc Napoli");
            searchBox.Submit();
            
            // wait for page to load
            driver.Manage().Timeouts().ImplicitlyWait(new TimeSpan(0, 0, 30));

            var textPresent = driver.FindElement(By.XPath("//*[contains(.,'Sito Ufficiale del Calcio…')]"));
            Assert.IsNotNull(textPresent);

        }

        [TestFixtureTearDown]
        public void FixtureTearDown()
        {
            // shut down driver and free memory
            driver.Quit();
        }
    }
}</textarea><br/>

		Another part that to me was quite obscure is the use of XPath and find element to search for text on the page. So I went and found out that 
		<cite> // Selects nodes in the document from the current node that match the selection no matter where they are </cite> taken from <a href="http://www.w3schools.com/xpath/xpath_syntax.asp">here,
		the nice guys at W3 School</a>
		
		I am debating with myself if explain everything that is on this page or not.... well it is 12:40am and I think it is time to sleep onit.
		But we have success, and I have succesfully set up my project. Hurray!
		</p>
				<div class="linkButtonLeft"> <a href="misc.php"> Prev </a> </div> 
				<div class="linkButtonRight"> <a href="pageTwoCs.php"> Next </a> </div>
		</div><!--centre-->
		
<?php include "../templates/bottom.php"?>
