package com.fc572.domain;

import com.fc572.repository.impl.UserCommentRepoImpl;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mock;
import org.mockito.Mockito;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.web.WebAppConfiguration;

import static junit.framework.Assert.assertTrue;
import static org.mockito.Matchers.any;
import static org.mockito.Mockito.*;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testPersistenceContext.xml"})
public class PersistenceLayerTest
{
    @Autowired
    private UserCommentRepoImpl userCommentManager;

    @Mock
    private JdbcTemplate mock_jdbcTemplate;
    private UserCommentRepoImpl toTestUserCommentManager = spy( new UserCommentRepoImpl(mock_jdbcTemplate));

    @Test
    public void testGetTemplate()
    {
        JdbcTemplate jdbcTemplate = userCommentManager.getJdbcTemplate();
        assertTrue(jdbcTemplate != null);
    }


    @Test
    public void testGettingComment()
    {
        doReturn(mock_jdbcTemplate)//also passed if argument is "" empty string
                .when( toTestUserCommentManager )
                .getUserComment(any(String.class), any(String.class));
    }

    @Test
    public void testWritingComment()
    {
       doNothing().when(toTestUserCommentManager).writeUserComment(any(String.class), any(String.class), any(String.class));
    }
}
