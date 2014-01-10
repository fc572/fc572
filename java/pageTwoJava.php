<?php include "../templates/top.php"?>
		<strong> Locating Elements on the page </strong>
		<p> The elements that I am looking for are on this page <a href="../htmlAndCss/TestPage.html">test page</a><br/>
			
			The first thing I have done is to create a method called navigate() that opens the URL that I want to test.<br/>
			In order to use this method everywhere, without having to instantiate a class every time, I am declaring the method 				static, so that I have to call the class name and the method. But a problem arises here. The WebDriver instance that I 				want to use in the NavigateToSite class is not the same one that I am using in the LocatingDomOnPage. So what happens 				here is that one driver is navigating to the right website, and the other one is just left in the dark about where to go. 				This is the faulty code and you'll see why.<br/>
<textarea readonly rows=30 cols=95>
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
So I have my navigate method and my locateElements methods and I want them to work together. In order to do so, I cannot instantiate for each class a new FirefoxDriver object otherwise each of the methods will work on its own, thus failing the tests.<br/>


		</p>
		
			<div class="linkButtonLeft"> <a href="pageOneJava.php"> Previous </a> </div>
			<div class="linkButtonRight"> <a href="pageThreeJava.php"> Next </a> </div>
		</div><!--centre-->

<?php include "../templates/bottom.php"?>



