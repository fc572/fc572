package com.fc572;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class FindElementsOnPage
{
    protected WebDriver driver;

    @Before
    public void setUp()
    {
        System.setProperty("webdriver.chrome.driver", "C:\\Users\\Francesco.Calvino\\.m2\\repository\\org\\seleniumhq\\selenium\\selenium-chrome-driver\\chromedriver.exe");
        //suppress warning on illegal flag from Chrome
        ChromeOptions chromeOptions = new ChromeOptions();
        chromeOptions.addArguments("test-type");
        driver = new ChromeDriver(chromeOptions);
    }

    @Test
    public void exerciseThePage() throws InterruptedException
    {
        driver.get("http://fc572.me/testpages/pagewithelements.php");

        driver.findElement(By.id("FindMeById")).sendKeys("This element has been found By.id");
//        driver.findElement(By.name("FindMeByName")).sendKeys("This element has been found By.name");
//
//        driver.findElement(By.className("findMeByClassName")).click();
//
//        driver.findElement(By.linkText("FindMeByLinkText")).click();
//
//        driver.getCurrentUrl();
//
//        driver.findElement(By.linkText("link")).click();
//
//        driver.getCurrentUrl();
//
//        driver.findElement(By.partialLinkText("FindMeByPartial")).click();
//
//        driver.getCurrentUrl();
//
//        driver.findElement(By.linkText("link")).click();

          driver.findElement(By.id("rightColumnText")).sendKeys(driver.findElement(By.cssSelector("ul:nth-of-type(1)>li")).getText());
        //$("ul:eq(1) li:eq(0)")
driver.wait(10);
    }

    @After
    public void close()
    {
        driver.close();
    }
}
