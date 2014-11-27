package fc572_simple.demo;


import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class TestThePage
{
    private WebDriver webDriver = new FirefoxDriver();

    @Before
    public void setUp()
    {
        webDriver.navigate().to("http://fc572.me/testpages/pagewithelements.php");
        webDriver.manage().window().maximize();
        WebElement waitForMe = (new WebDriverWait(webDriver, 10))
                .until(ExpectedConditions.presenceOfElementLocated(By.id("FindMeById")));
    }

    @After
    public void destroyTest()
    {
        webDriver.close();
    }

    @Test
    public void thisIsATest()
    {
        WebElement findMeById = webDriver.findElement(By.id("FindMeById"));
        WebElement findMeByName = webDriver.findElement(By.name("FindMeByName"));
        WebElement findMeByClassName = webDriver.findElement(By.className("findMeByClassName"));
        WebElement findMeByLinkText = webDriver.findElement(By.linkText("FindMeByLinkText"));
        WebElement findMeByPartialLinkText = webDriver.findElement(By.partialLinkText("FindMeByPartia"));
        WebElement findMeByCssSelector = webDriver.findElement(By.cssSelector("#leftcolumn ul:first-child > li:first-child"));
        WebElement findMeByCssSelector2 = webDriver.findElement(By.cssSelector("#leftcolumn ul:nth-child(2) > li:first-child"));
        WebElement findMeByCssSelector3 = webDriver.findElement(By.cssSelector("#leftcolumn ul:nth-child(4) li:last-child"));
        WebElement findMeByXPath = webDriver.findElement(By.xpath("//input[@type='checkbox' and @value='HappyTesting']"));
        WebElement findMeByXPath2 = webDriver.findElement(By.xpath("//input[@name='pickMe' and @value='HappyTesting']"));

        findMeById.sendKeys("Found By.id");
        findMeByName.sendKeys("Found By.Name");
        findMeByClassName.click();
        findMeByLinkText.getText().equalsIgnoreCase("FindMeByLinkText");
        findMeByPartialLinkText.getText().equalsIgnoreCase("FindMeByPartialLinkText");
        findMeByCssSelector.getText().equalsIgnoreCase("Item 1");
        findMeByCssSelector2.getText().equalsIgnoreCase("Sub Item 1.1");
        findMeByCssSelector3.getText().equalsIgnoreCase("Sub Item 2.3");
        findMeByXPath.click();
        findMeByXPath2.click();

    }
}
