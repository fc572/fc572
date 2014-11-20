package fc572_PO.pages;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class HomePage extends Page
{
    public WebElement title;
    public WebElement findMeById;
    public WebElement findMeByName;
    public WebElement findMeByClassName;
    public WebElement findMeByLinkText;
    public WebElement findMeByPartialLinkText;
    public WebElement findMeByCssSelector;

    public HomePage(WebDriver webDriver)
    {
        super(webDriver);
        //PageFactory.initElements(webDriver,this);

        findMeById = webDriver.findElement(By.id("FindMeById"));
        findMeByName = webDriver.findElement(By.name("FindMeByName"));
        findMeByClassName = webDriver.findElement(By.className("findMeByClassName"));
        findMeByLinkText = webDriver.findElement(By.linkText("FindMeByLinkText"));
        findMeByPartialLinkText = webDriver.findElement(By.partialLinkText("FindMeByPartia"));
        findMeByCssSelector = webDriver.findElement(By.cssSelector("#leftcolumn ul:first-child > li:first-child"));
    }
}
