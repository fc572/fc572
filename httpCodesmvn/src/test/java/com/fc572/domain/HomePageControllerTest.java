package com.fc572.domain;

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
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.view;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testApplicationContext.xml","classpath:httpcodesServlet.xml",
        "classpath:persistenceContext.xml"})
public class HomePageControllerTest
{
    private MockMvc mockMvcController;

    @Autowired
    private WebApplicationContext webApplicationContext;

    @Before
    public void setUp()
    {
        mockMvcController =
                MockMvcBuilders.webAppContextSetup(webApplicationContext).build();
    }

    @Test
    public void testHomePage() throws Exception
    {
        mockMvcController.perform(get("/"))
                .andExpect(status().isOk())
                .andExpect(view().name("firstpage"));
    }

    @Test
    public void testPageTest() throws Exception
    {
        mockMvcController.perform(get("/testpage"))
                .andExpect(status().isOk())
                .andExpect(view().name("testpage"));

    }

    @Test
    public void testPageLinkBackTest() throws Exception
    {
        mockMvcController.perform(get("/testpagelinkback"))
                .andExpect(status().isOk())
                .andExpect(view().name("testpagelinkback"));
        //.andExpect(content(containsString("I have clicked a link and I have landed here")));
    }
}
