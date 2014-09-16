package com.fc572.domain;

import com.fc572.controller.UserCommentController;
import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.web.WebAppConfiguration;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.setup.MockMvcBuilders;
import org.springframework.web.context.WebApplicationContext;

import static org.hamcrest.Matchers.containsString;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testApplicationContext.xml", "classpath:httpcodesServlet.xml",
                                    "classpath:persistenceContext.xml"})

public class CommentTest
{
    private MockMvc mockMvcController;

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
        mockMvcController.perform(get("/comment")
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
        mockMvcController.perform(post("/comment")
                        .param("userId", "99998")
                        .param("userKey", "fc572Test")
                        .param("comment", "This is a test comment")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("commentPage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/commentPage.jsp"))
                .andExpect(model().attribute("message", containsString("Do you want to add to the following comment(s)?")));
    }
}
