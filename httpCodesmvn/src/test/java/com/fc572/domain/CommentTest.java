package com.fc572.domain;

import com.fc572.controller.UserCommentController;
import com.fc572.repository.impl.UserCommentRepoImpl;
import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mock;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.web.WebAppConfiguration;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.setup.MockMvcBuilders;
import org.springframework.web.context.WebApplicationContext;

import static org.hamcrest.Matchers.containsString;
import static org.mockito.Mockito.spy;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.*;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testApplicationContext.xml", "classpath:httpcodesServlet.xml",
                                    "classpath:persistenceContext.xml"})

public class CommentTest
{
    private MockMvc mockMvcController;

    @Mock
    private JdbcTemplate mock_jdbcTemplate;
    private UserCommentRepoImpl toTestUserCommentManager = spy( new UserCommentRepoImpl(mock_jdbcTemplate));
    @Autowired
    private WebApplicationContext webApplicationContext;

    @Autowired
    private UserCommentController userCommentController;

    @Before
    public void setUp()
    {
        mockMvcController =
                MockMvcBuilders.webAppContextSetup(webApplicationContext).build();
    }

    @Test
    public void testReadCommentPage() throws Exception
    {
        //a good test is formed of three parts

        // 1 - set the data for the test
        String paramOne = "1";
        String paramTwo = "fc572";

        // 2 - check that the parameters are correct
        mockMvcController.perform(get("/comment/read")
                    .param("userId", paramOne)
                    .param("userKey", paramTwo))
                .andExpect(status().isOk())
                .andExpect(view().name("commentPage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/commentPage.jsp"))
                .andExpect(model().attribute("message", containsString("Please insert a comment")));


        // 3 - verify that the calls are in order and
    }

    @Test
    public void testWriteCommentPage() throws Exception
    {
        mockMvcController.perform(post("/comment/write")
                        .param("writeUserId", "99998")
                        .param("writeUserKey", "fc572Test")
                        .param("writeComment", "This is a test comment")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("commentPage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/commentPage.jsp"))
                .andExpect(model().attribute("message", containsString("Your comment has been saved")));
    }

    @Test
    public void testDeleteCommentPage() throws Exception
    {
        mockMvcController.perform(delete("/comment/delete")
                .param("userId", "99998")
                .param("userKey", "fc572Test")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("commentPage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/commentPage.jsp"))
                .andExpect(model().attribute("message", containsString("Your comment has been deleted")));
    }
}
