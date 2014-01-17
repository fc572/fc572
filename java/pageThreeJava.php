<?php include "../templates/top.php"?>
		<strong> A simple test </strong>
		<p> What I want to do here is to insert a comment into the database using the form on this page <a href="http://www.fc572.me/php/pageTwoPhp.php">http://www.fc572.me/php/pageTwoPhp.php</a>, and then I am going to make a call
			to my API to retrieve it and check that the table has been populated.<br/>

<textarea readonly rows=120 cols=95>package com.fc572.webTest;

import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.junit.*;

public class TestRunner {

    protected final WebDriver driver = new FirefoxDriver();

    @Test
    public void runTheTests(){
        
        StatusPageTest spt = new StatusPageTest(driver);
        SetComment sc = new SetComment(driver);
        
        sc.goSetComment();
        spt.statusTest();
    }

    @After
    public void tearDown()
    {
        driver.close();
    }
}

//The classes called are below this line
package com.fc572.webTest;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.util.concurrent.TimeUnit;

import static org.junit.Assert.*;

public class SetComment extends Page {

    public SetComment(WebDriver driver){
        super(driver);
    }

    public void goSetComment(){

        //go to the page containing the form
        driver.navigate().to(Helper.getUrl() + "/php/pageTwoPhp.php");
        //wait for the page to load
        WebDriverWait wait = new WebDriverWait(driver, 10);
        wait.until(ExpectedConditions.titleContains("fc572"));
        //find the elements to populate with the text
        WebElement element = driver.findElement(By.id("key"));
        element.sendKeys("123Key");

        element = driver.findElement(By.id("formInputFormat"));
        element.sendKeys("Hello Selenium");
        //find the button to click
        element = driver.findElement(By.id("submitForm"));
        element.click();
        //wait for the confirmation message to come up
        driver.manage().timeouts().implicitlyWait(1, TimeUnit.SECONDS);
        //check that the record has been inserted
        element = driver.findElement(By.className("comment"));
        assertEquals("\"The record has been inserted\"", element.getText());

    }
}


//And also here

package com.fc572.webTest;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import static org.junit.Assert.*;

import java.util.List;

public class StatusPageTest extends Page {

    public StatusPageTest(WebDriver driver){
        super(driver);
    }

    public void statusTest(){
	//Navigate to site
        driver.navigate().to(Helper.getUrl() + "/php/api.php?your_key=12345Key");
	
	//wait for the page to load
        WebDriverWait wait = new WebDriverWait(driver, 10);
        wait.until(ExpectedConditions.titleContains("fc572"));
	
	//find elements on the table
        WebElement element = driver.findElement(By.id("getApiTable"));
        List<WebElement> rows = element.findElements(By.tagName("tr"));
        assertEquals(2, rows.size());
	
	//find the text within the table
        for(WebElement row : rows){
            if(row.getText() == "Hello Selenium"){
                assertTrue(true);
            }
        }
    }
}

</textarea><br/>
Above in the code there are 3 different classes</br>
The first just runs the tests.</br>
The second insert a comment into the database</br>
The third one verifies that the comment inserted in the database can be retrieved and that it matches what has been inserted.</br>


		</p>
		
			<div class="linkButtonLeft"> <a href="pageTwoJava.php"> Previous </a> </div>
			<div class="linkButtonRight"> <a href="pageThreeJava.php"> Next </a> </div>
		</div><!--centre-->

<?php include "../templates/bottom.php"?>



