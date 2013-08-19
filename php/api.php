<?php

	echo "API PHP <br/>";
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
				echo "<br/><br/>";
				echo "<table id=\"HTTP STATUSES\" border=2>";
				echo "<tr bgcolor=#dadada>";
				echo "<td width=\"15%\">Code</td><td width=\"15%\">Message</td></tr>";
				echo"<tr> <td width=\"15%\">".$status_requested."</td> <td width=\"15%\">".$message."</td></tr>";
				echo "</table>";  
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
			$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
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
					echo "<br/><br/>";
					echo "<table id=\"getApiTable\" border=2>";
					echo "<tr bgcolor=#dadada>";
					echo "<td width=\"15%\">Name</td><td width=\"15%\">Surname</td><td width=\"15%\">Your_key</td><td width=\"15%\">email</td><td width=\"15%\">comment</td>";
					echo "</tr>";
					echo"<tr> <td width=\"15%\">".$name."</td> <td width=\"15%\">".$surname."</td><td width=\"15%\">".$your_key."</td><td width=\"15%\">".$email."</td><td width=\"15%\">".$comment."</td> </tr>";
					echo "</table>";
				}
				else
				{
					echo "<br/><br/>";
					echo "Your key <strong>"  .$key ."</strong>  is not present on our records, try again";
				}
					unset($result);
			}
			else
			{
				echo "Can't connect to localhost. Error: %s\n", mysqli_connect_error();
			}
			mysqli_close($link);
		}
?>
