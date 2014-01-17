<?php include "../templates/top.php"?>
		<strong> Api Test </strong>
		<p> I have the statues that you can call like this <a href="http://www.fc572.me/php/status.php?requesting-status=200">http://www.fc572.me/php/status.php?requesting-status=200</a>
		and that will return the header containing the status of the code that you have requested while on the page you'll see the "human" meaning for that code<br/>

<textarea readonly rows=120 cols=95>
package com.fc572.api;


import com.fc572.webTest.Helper;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicHeader;

public class ApiBase {

    public HttpGet uriBuilder(String uri){
        return(new HttpGet(Helper.getUrl() + uri));
    }

    public int apiBaseCall(String uri){

        HttpGet request;

        HttpClient httpClient = new DefaultHttpClient();

        request = uriBuilder(uri);

        request.setHeader( new BasicHeader("Content-type", "text/plain"));

        try{
            HttpResponse response = httpClient.execute(request);
            return(response.getStatusLine().getStatusCode());
        }
        catch(Exception e){
            return -1;
        }
    }

    public boolean statusCodeCall(int codeRequested){

        int statusCode = apiBaseCall("/php/status.php?requesting-status=" + codeRequested);

        if(statusCode == codeRequested){
            return true;
        }
        return false;
    }
}

// And then I can call the class above using this

package com.fc572.api;

import org.junit.Test;
import static org.junit.Assert.*;

public class StatusesCall{

    @Test
    public void testCall(){

        ApiBase api = new ApiBase();

        assertTrue(api.statusCodeCall(200));
    }
}

</textarea><br/>

</br>


		</p>
		
			<div class="linkButtonLeft"> <a href="pageThreeJava.php"> Previous </a> </div>
			<!--div class="linkButtonRight"> <a href=""> Next </a> </div-->
		</div><!--centre-->

<?php include "../templates/bottom.php"?>



