package fc572_PO.pages;

import org.junit.Test;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.PageFactory;

public class HomePage
{
    public WebElement findMeById;
    public WebElement findMeByName;
    public WebElement findMeByClassName;
    public WebElement findMeByLinkText;
    public WebElement findMeByPartialLinkText;
    public WebElement findMeByCssSelector;
    public WebElement findMeByCssSelector2;
    public WebElement findMeByCssSelector3;
    public WebElement findMeByXPath;
    public WebElement findMeByXPath2;

    public HomePage(WebDriver webDriver)
    {
        PageFactory.initElements(webDriver, this);

//        findMeById = webDriver.findElement(By.id("FindMeById"));
//        findMeByName = webDriver.findElement(By.name("FindMeByName"));
//        findMeByClassName = webDriver.findElement(By.className("findMeByClassName"));
//        findMeByLinkText = webDriver.findElement(By.linkText("FindMeByLinkText"));
//        findMeByPartialLinkText = webDriver.findElement(By.partialLinkText("FindMeByPartia"));
//        findMeByCssSelector = webDriver.findElement(By.cssSelector("#leftcolumn ul:first-child > li:first-child"));
//        findMeByCssSelector2 = webDriver.findElement(By.cssSelector("#leftcolumn ul:nth-child(2) > li:first-child"));
//        findMeByCssSelector3 = webDriver.findElement(By.cssSelector("#leftcolumn ul:nth-child(4) li:last-child"));
//        findMeByXPath = webDriver.findElement(By.xpath("//input[@type='checkbox' and @value='HappyTesting']"));
//        findMeByXPath2 = webDriver.findElement(By.xpath("//input[@name='pickMe' and @value='HappyTesting']"));

    }

    @Test
    public void thisIsATest()
    {

        WebDriver webDriver = new FirefoxDriver();
        webDriver.navigate().to("http://fc572.me/testpages/pagewithelements.php");

        HomePage homePage = new HomePage(webDriver);

        homePage.findMeById.sendKeys("Found By.id");
        homePage.findMeByName.sendKeys("Found By.Name");
        homePage.findMeByClassName.click();
        homePage.findMeByLinkText.getText().equalsIgnoreCase("FindMeByLinkText");
        homePage.findMeByPartialLinkText.getText().equalsIgnoreCase("FindMeByPartialLinkText");
        homePage.findMeByCssSelector.getText().equalsIgnoreCase("Item 1");
        homePage.findMeByCssSelector2.getText().equalsIgnoreCase("Sub Item 1.1");
        homePage.findMeByCssSelector3.getText().equalsIgnoreCase("Sub Item 2.3");
        homePage.findMeByXPath.click();
        homePage.findMeByXPath2.click();

    }
}
