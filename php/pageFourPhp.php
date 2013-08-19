<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> PHP API </title>
	</head>

	<body>
		<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> API in PHP </strong>
		<p>
		In this page I am going to write a RESTful API to retrieve the values inserted into the comments form.<br/>
		To do that I am thinking to use the value inserted into the your_Key as a kind of password to retrieve your record so without this 
		information there will be no records returned. Also the formatting will be json so that we can use it later on with javascript and the likes.
		I don't know yet how but I'll think of something.
		<br/>
		So for now let's concentrate on the API.
		<br/>
		API is the acronym for Application Programming Interface. Think of an interface as a place that connects two different things. For example
		a train station is an interface between the train and the road. And as there are rules to access the train station, so there are rules in 
		the API. So this combination of rules and connection makes your program available to external sources. This is what I am going to do; An interface between
		the database and the webPage that requires information.<br/>
		In order to write an API I need to create a new file api.php and put it on my web-server. This is the file that will be accessible from outside.
		Having read few things on the web I have now the following map to go about<br/>
		<ol>
			<li> Accept the input that comes from the outside</li>
			<li> Process the input by retrieving record from DB</li>
			<li> Return results</li>
		</ol>
		What I have also done is to create the API so that if send the URI http://www.fc572.me/php/api.php?your_key={your_key} then it will return the comment that 
		you have been inserted in the previous form. If the URI http://www.fc572.me/php/api.php?your_key=fc572&requestingStatus=200 then the API will return 
		the description of the code you have requested alongside the numerical value.
<strong> Please note that to return a status the key must be fc572 </strong><br/>

		This is the code that accomplish this<br/>
		<pre>
		<code>
&gt;?php

	echo "API PHP &gt;br/&lt;";
	if(!empty($_GET["your_key"]))
	{
		$inputKey = $_GET["your_key"];
		if($inputKey == 'fc572')
		{
					$status_requested = $_GET["requestingStatus"];
					$message = "The HTTP status requested means ";
					switch($status_requested)
					{
						case 100: $message = $message."Continue"; break;
						case 101: $message = $message."Switching Protocols"; break;
						case 102: $message = $message."Processing";break;
						case 200: $message = $message."OK";break;
						case 201: $message = $message."Created";break;
						case 202: $message = $message."Accepted";break;
						case 203: $message = $message."Non-Authoritative Information";break;
						case 204: $message = $message."No Content";break;
						case 205: $message = $message."Reset Content";break;
						case 206: $message = $message."Partial Content";break;
						case 207: $message = $message."Multi-Status";break;
						case 226: $message = $message."IM Used";break;
						case 300: $message = $message."Multiple Choices";break;
						case 301: $message = $message."Moved Permanently";break;
						case 302: $message = $message."Found";break;
						case 303: $message = $message."See Other";break;
						case 304: $message = $message."Not Modified";break;
						case 305: $message = $message."Use Proxy";break;
						case 306: $message = $message."Reserved";break;
						case 307: $message = $message."Temporary Redirect";break;
						case 400: $message = $message."Bad Request";break;
						case 401: $message = $message."Unauthorized";break;
						case 402: $message = $message."Payment Required";break;
						case 403: $message = $message."Forbidden";break;
						case 404: $message = $message."Not Found";break;
						case 405: $message = $message."Method Not Allowed";break;
						case 406: $message = $message."Not Acceptable";break;
						case 407: $message = $message."Proxy Authentication Required";break;
						case 408: $message = $message."Request Timeout";break;
						case 409: $message = $message."Conflict";break;
						case 410: $message = $message."Gone";break;
						case 411: $message = $message."Length Required";break;
						case 412: $message = $message."Precondition Failed";break;
						case 413: $message = $message."Request Entity Too Large";break;
						case 414: $message = $message."Request-URI Too Long";break;
						case 415: $message = $message."Unsupported Media Type";break;
						case 416: $message = $message."Requested Range Not Satisfiable";break;
						case 417: $message = $message."Expectation Failed";break;
						case 422: $message = $message."Unprocessable Entity";break;
						case 423: $message = $message."Locked";break;
						case 424: $message = $message."Failed Dependency";break;
						case 426: $message = $message."Upgrade Required";break;
						case 500: $message = $message."Internal Server Error";break;
						case 501: $message = $message."Not Implemented";break;
						case 502: $message = $message."Bad Gateway";break;
						case 503: $message = $message."Service Unavailable";break;
						case 504: $message = $message."Gateway Timeout";break;
						case 505: $message = $message."HTTP Version Not Supported";break;
						case 506: $message = $message."Variant Also Negotiates";break;
						case 507: $message = $message."Insufficient Storage";break;
						case 510: $message = $message."Not Extended";break; 
						default: $message = "ERROR this HTTP code you have request is not present in my list";
					}
				echo "&gt;br/&lt;&gt;br/&lt;";
				echo "&gt;table id=\"HTTP STATUSES\" border=2&lt;";
				echo "&gt;tr bgcolor=#dadada&lt;";
				echo "&gt;td width=\"15%\"&lt;Code&gt;/td&lt;&gt;td width=\"15%\"&lt;Message&gt;/td&lt;&gt;/tr&lt;";
				echo"&gt;tr&lt; &gt;td width=\"15%\"&lt;".$status_requested."&gt;/td&lt; &gt;td width=\"15%\"&lt;".$message."&gt;/td&lt;&gt;/tr&lt;";
				echo "&gt;/table&lt;";  
		}
		else 
		{
				$request_method = strtolower($_SERVER['REQUEST_METHOD']);
				if ($request_method == 'get')
				{
					retrieveDataFromDb($inputKey);
				}
		}
	}
	else
	{	
		echo "Please insert a value into your_key";
	}	
  
  function retrieveDataFromDb($key)
		{			
			$your_key = "";
			$link = mysqli_connect("localhost", "username", "password", "databaseName");
			if($link)
			{
				$query = "SELECT * FROM usercomments WHERE your_key = '" .$key ."'";
				
				$results = mysqli_query($link,$query);
				
				foreach($results as $result)
				{
					$name = $result['name'];
					$surname = $result['surname'];
					$your_key =  $result['your_key'];
					$email = $result['email'];
					$comment = $result['comment'];
				}

				if(((string)($your_key)) == ((string)($key)))
				{
					echo "&gt;br/&lt;&gt;br/&lt;";
					echo "&gt;table id=\"getApiTable\" border=2&lt;";
					echo "&gt;tr bgcolor=#dadada&lt;";
					echo "&gt;td width=\"15%\"&lt;Name&gt;/td&lt;&gt;td width=\"15%\"&lt;Surname&gt;/td&lt;&gt;td width=\"15%\"&lt;Your_key&gt;/td&lt;&gt;td width=\"15%\"&lt;email&gt;/td&lt;&gt;td width=\"15%\"&lt;comment&gt;/td&lt;";
					echo "&gt;/tr&lt;";
					echo"&gt;tr&lt; &gt;td width=\"15%\"&lt;".$name."&gt;/td&lt; &gt;td width=\"15%\"&lt;".$surname."&gt;/td&lt;&gt;td width=\"15%\"&lt;".$your_key."&gt;/td&lt;&gt;td width=\"15%\"&lt;".$email."&gt;/td&lt;&gt;td width=\"15%\"&lt;".$comment."&gt;/td&lt; &gt;/tr&lt;";
					echo "&gt;/table&lt;";
				}
				else
				{
					echo "&gt;br/&lt;&gt;br/&lt;";
					echo "Your key &gt;strong&lt;"  .$key ."&gt;/strong&lt;  is not present on our records, try again";
				}
					unset($result);
			}
			else
			{
				echo "Can't connect to localhost. Error: %s\n", mysqli_connect_error();
			}
			mysqli_close($link);
		}
?&lt;
</pre>
</code>
		I hope to comment on the code asap, also because otherwise I am going to forget..... ah ah!
		</p>
		
		<div class="chapter"> <div class="prev"> <a href="pageThreePhp.php"> Previous </a> </div> <div class="next"> <a href=".php"> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>
