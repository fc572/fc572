package httpservercode;


import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.MockitoAnnotations;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.web.WebAppConfiguration;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.setup.MockMvcBuilders;
import org.springframework.web.context.WebApplicationContext;

@WebAppConfiguration
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:testApplicationContext.xml","classpath:httpcodes-servlet.xml" })

public class HttpCodesControllerTest
{
    private MockMvc mockMvc;

    private MockMvc mockMvcController;

    @Autowired
    private WebApplicationContext webApplicationContext;

    @Autowired
    private HttpCodesController mock_httpCodesController;

    @Before
    public void setUp()
    {

        // Process mock annotations
        MockitoAnnotations.initMocks(this);

        mockMvcController =
                MockMvcBuilders.webAppContextSetup(webApplicationContext).build();
    }

    @Test
    public void testCodes() throws Exception
    {
        //a good test is formed of three parts

        // 1 - set the data for the test


        // 2 - check that the parameters are correct


        // 3 - verify that the calls are in order and
    }
}
