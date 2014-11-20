package fc572_PO.demo;


import fc572_PO.pages.HomePage;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import static org.junit.Assert.assertTrue;

public class TestThePage
{
    private HomePage homePage;

    private WebDriver webDriver = new FirefoxDriver();

    @Before
    public void setUp()
    {
        webDriver.navigate().to("http://fc572_PO.me/testpages/pagewithelements.php");
        WebElement waitForMe = (new WebDriverWait(webDriver, 10))
                .until(ExpectedConditions.presenceOfElementLocated(By.id("FindMeById")));
        homePage = new HomePage(webDriver);
    }

    @Test
    public void thisIsATest()
    {
        assertTrue(homePage.title.getText().equalsIgnoreCase("fc572_PO"));

        homePage.findMeById.sendKeys("You have found my using find(By.id)");

    }
}
