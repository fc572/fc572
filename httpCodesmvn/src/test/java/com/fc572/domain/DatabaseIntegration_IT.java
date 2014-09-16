package com.fc572.domain;


import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.support.rowset.SqlRowSet;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.web.WebAppConfiguration;

import static junit.framework.Assert.assertTrue;
import static junit.framework.Assert.fail;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:persistenceContext.xml"})

public class DatabaseIntegration_IT
{
    @Autowired
    JdbcTemplate jdbcTemplate;

    @Test
    public void testThereIsAConnectionToTheDatabase()
    {
        int num = jdbcTemplate.queryForInt("SELECT 1");

        assertTrue(num == 1);
    }

    @Test
    public void createATestRecordIntoTheDatabase()
    {
        String query = "INSERT INTO usercomment VALUES(\"99999\", \"fc572\", \"TEST\")";

        try
        {
            jdbcTemplate.execute(query);
        } catch (Exception e)
        {
            assertTrue("The record creation has failed", e == null);
        }
    }

    @Test
    public void readTheTestRecordFromTable()
    {
        String query = "SELECT * FROM usercomment WHERE userId = 99999";
        String resultToAssert;

        SqlRowSet result = jdbcTemplate.queryForRowSet(query);

        if(result.next())
        {
            resultToAssert = result.getString(3);
            assertTrue(resultToAssert.equalsIgnoreCase("TEST"));
        }
        else
        {
            fail("The result set is empty hence the read operation has failed");
        }
    }

    @Test
    public void updateTheTestRecordInTheDatabase()
    {
        String query = "UPDATE usercomment SET userComment = \"This is an update\" WHERE userId = 99999";
        int numberOfRowsUpdated;

        numberOfRowsUpdated = jdbcTemplate.update(query);

        assertTrue(numberOfRowsUpdated == 1);
    }

    @Test
    public void deleteTheTestRecordFromTheDatabase()
    {
        String query = "DELETE FROM usercomment WHERE userId = 99999";

        jdbcTemplate.execute(query);

        query = "SELECT * FROM usercomment WHERE userId = 99999";

        SqlRowSet result = jdbcTemplate.queryForRowSet(query);

        if(result.next())
        {
            fail("The resultset is not empty as expected");
        }
        else
        {
            assertTrue("The test has passed and the record has been deleted", true);
        }
    }
}