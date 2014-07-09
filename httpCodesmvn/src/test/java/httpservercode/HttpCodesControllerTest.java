package httpservercode;


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
import static org.hamcrest.Matchers.greaterThanOrEqualTo;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;


@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testApplicationContext.xml","classpath:httpcodes-servlet.xml" })

public class HttpCodesControllerTest
{
    private MockMvc mockMvcController;

    @Autowired
    private WebApplicationContext webApplicationContext;

    @Autowired
    private HttpCodesController httpCodesController;

    @Before
    public void setUp()
    {
 //       Mockito.reset(this);

        mockMvcController =
                MockMvcBuilders.webAppContextSetup(webApplicationContext).build();

    }

    @Test
    public void testCodeWelcomePage() throws Exception
    {
        //a good test is formed of three parts

        // 1 - set the data for the test


        // 2 - check that the parameters are correct
        mockMvcController.perform(get("/"))
                    .andExpect(status().isOk())
                    .andExpect(view().name("firstpage"))
                    .andExpect(forwardedUrl("/WEB-INF/pages/firstpage.jsp"))
                    .andExpect(model().attribute("message", containsString("Please insert the HTTP code")));

        // 3 - verify that the calls are in order and
    }

    @Test
    public void testFoundPage() throws Exception
    {
        mockMvcController.perform(post("/form")
                .param("codeInput", "200")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("codefoundpage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/codefoundpage.jsp"))
                .andExpect(model().attribute("messageToAHuman", containsString("OK")))
                .andExpect(model().attribute("messageCode", greaterThanOrEqualTo(200)));
    }

    @Test
    public void testNotFoundPage() throws Exception
    {
        mockMvcController.perform(post("/form")
                        .param("codeInput", "999")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("codenotfoundpage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/codenotfoundpage.jsp"))
                .andExpect(model().attribute("message", containsString("Code not found")))
                .andExpect(model().attribute("messageCode", greaterThanOrEqualTo(999)));
    }

    @Test
    public void testInputOfChars() throws Exception
    {
        mockMvcController.perform(post("/form")
                .param("codeInput", "*&^2")
        )
                .andExpect(status().isOk())
                .andExpect(view().name("codenotfoundpage"))
                .andExpect(forwardedUrl("/WEB-INF/pages/codenotfoundpage.jsp"))
                .andExpect(model().attribute("message", containsString("The input is not valid, please insert only numbers")))
                .andExpect(model().attribute("messageCode", containsString("*&^2")));
    }


}
