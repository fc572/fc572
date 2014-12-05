package integrationtest;

import org.junit.Assert;
import org.junit.Test;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.htmlunit.HtmlUnitDriver;

import java.sql.Connection;
import java.sql.Driver;
import java.sql.DriverManager;

import static org.junit.Assert.assertTrue;

public class ConnectFc572_IT_Test
{
    @Test
    public void connectionTest()
    {
        WebDriver driver = new HtmlUnitDriver();
        driver.navigate().to("http://www.fc572_PO.me");
        assertTrue(driver.getTitle().equalsIgnoreCase("fc572_PO"));
    }

    @Test
    public void connectToDbTest()
    {
        Connection connect;
        String host = "fc572Comments.db.11418243.hostedresource.com";
        String datab = "fc572Comments";
        String password = "Z@rathustra111";
        String userName = "fc572Comments";

        try {
            Class.forName ("com.mysql.jdbc.Driver").newInstance();
        } catch (Exception e) {
            System.out.println("JDBC-ODBC driver failed to load.");
            return;
        }

        try {
            String url = "jdbc:mysql://" + host + ":3306/" + datab;

            Driver test = DriverManager.getDriver(url);
            // testing to make sure i'm using the correct
            //driver and further testing host
            System.out.println(test);
            connect = DriverManager.getConnection(url, userName, password);

            System.out.println ("Connected to " + host);
            connect.close();
        } catch (Exception e)
        {
            Assert.fail("There was an error " + e.getMessage());
        }
    }
}
