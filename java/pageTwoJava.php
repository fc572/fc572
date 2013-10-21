<?php include "../templates/top.php"?>
		<strong> Locating Elements on the page </strong>
		<p>
			Before starting locating the elements on the page, let's put some of them into a web page.... <br/>
			The elements that I am looking for are enclosed in a dotted line<br/>
			
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
				Also because Css Selectors are a lot, see <a href="http://www.w3schools.com/cssref/css_selectors.asp"> here in the W3schools website <a/>
			
				I am going to add a list, check boxes and radio buttons that are the most likely you'll find on a web page <br/>
				<ul>
					<li> First element</li>
					<li> Second element</li>
					<li> Third element</li>
				</ul>
			</div>
			<br/>
			Also I am going to use XPath in the second example for check boxes and I am going 
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

			The first thing I have done is to create a method called navigate() that opens the URL that I want to test.<br/>
			In order to use this method everywhere, without having to instantiate a class every time, I am declaring the method static, so that I have
			to call the class name and the method. But a problem arises here. The WebDriver instance that I want to use in the NavigateToSite class is 
			not the same one that I am using in the LocatingDomOnPage. So what happens here is that one driver is navigating to the right website, and 
			the other one is just left in the dark about where to go. This is the faulty code and you'll see why.<br/>
<textarea readonly rows=10 cols=95>
public class NavigateToSite {

    @Test
    public static void navigate(){
        WebDriver driver =  new FirefoxDriver();
        Properties prop = new Properties();

        //load a properties file
        try {
            prop.load(new FileInputStream("environment.config"));
        } catch (IOException e) {
            e.printStackTrace();
        }

        driver.navigate().to(prop.getProperty("environment_ON"));
    }
}

public class LocatingDomOnPage {

    WebDriver driver = new FirefoxDriver();

    @Test
    public void locateElements(){
        NavigateToSite.navigate();
        WebElement element = driver.findElement(By.id("FindMeById"));
        element.sendKeys("I was found using my ID");
    }
}


</textarea><br/>
At this point in order to use the same driver I have to declare it somewhere else and then make all the classes to use it.<br/>
How do I do that? <br/>
So I have my navigate method and my locateElements methods and I want them to work together. In order to do so, I cannot instantiate for each class
a new FirefoxDriver object otherwise each of the methods will work on its own, thus rendering failing the test.<br/>


		</p>
		
			<div class="linkButtonLeft"> <a href="pageOneJava.php"> Previous </a> </div>
			<!--div class="linkButtonRight"> <a href=""> Next </a> </div-->
		</div><!--centre-->

<?php include "../templates/bottom.php"?>



