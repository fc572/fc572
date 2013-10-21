<?php include "../templates/top.php";?>
<p>
		<h2> APIs </h2>
<?php
	if(!empty($_GET["your_key"]))
	{
		$inputKey = $_GET["your_key"];
		if($inputKey == 'fc572')
		{
					$status_requested = $_GET["requestingStatus"];
					$message = "";
					switch($status_requested)
					{
						case 100: $message = "Continue"; break;
						case 101: $message = "Switching Protocols"; break;
						case 102: $message = "Processing";break;
						case 200: $message = "OK";break;
						case 201: $message = "Created";break;
						case 202: $message = "Accepted";break;
						case 203: $message = "Non-Authoritative Information";break;
						case 204: $message = "No Content";break;
						case 205: $message = "Reset Content";break;
						case 206: $message = "Partial Content";break;
						case 207: $message = "Multi-Status";break;
						case 226: $message = "IM Used";break;
						case 300: $message = "Multiple Choices";break;
						case 301: $message = "Moved Permanently";break;
						case 302: $message = "Found";break;
						case 303: $message = "See Other";break;
						case 304: $message = "Not Modified";break;
						case 305: $message = "Use Proxy";break;
						case 306: $message = "Reserved";break;
						case 307: $message = "Temporary Redirect";break;
						case 400: $message = "Bad Request";break;
						case 401: $message = "Unauthorized";break;
						case 402: $message = "Payment Required";break;
						case 403: $message = "Forbidden";break;
						case 404: $message = "Not Found";break;
						case 405: $message = "Method Not Allowed";break;
						case 406: $message = "Not Acceptable";break;
						case 407: $message = "Proxy Authentication Required";break;
						case 408: $message = "Request Timeout";break;
						case 409: $message = "Conflict";break;
						case 410: $message = "Gone";break;
						case 411: $message = "Length Required";break;
						case 412: $message = "Precondition Failed";break;
						case 413: $message = "Request Entity Too Large";break;
						case 414: $message = "Request-URI Too Long";break;
						case 415: $message = "Unsupported Media Type";break;
						case 416: $message = "Requested Range Not Satisfiable";break;
						case 417: $message = "Expectation Failed";break;
						case 422: $message = "Unprocessable Entity";break;
						case 423: $message = "Locked";break;
						case 424: $message = "Failed Dependency";break;
						case 426: $message = "Upgrade Required";break;
						case 500: $message = "Internal Server Error";break;
						case 501: $message = "Not Implemented";break;
						case 502: $message = "Bad Gateway";break;
						case 503: $message = "Service Unavailable";break;
						case 504: $message = "Gateway Timeout";break;
						case 505: $message = "HTTP Version Not Supported";break;
						case 506: $message = "Variant Also Negotiates";break;
						case 507: $message = "Insufficient Storage";break;
						case 510: $message = "Not Extended";break; 
						default: "ERROR this HTTP code you have request is not present in my list";
					}
				echo "<br/><br/>";
				echo "<table id=\"HTTP STATUSES\" border=2>";
				echo "<tr bgcolor=#dadada>";
				echo "<td width=\"15%\">Code</td><td width=\"15%\">The HTTP status requested means</td></tr>";
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
			
				$item = mysqli_fetch_assoc($results); //before that I tried with a foreach statement but it did not work as the db was returning
				//only one result, which does not allow foreach to iterate therefore the foreach was not working.
                
				    $name = $item['name'];
					$surname = $item['surname'];
					$your_key =  $item['your_key'];
					$email = $item['email'];
					$comment = $item['comment'];

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
</p>
	<!--div class="linkButtonLeft"> <a href="pageOnePhp.php"> Prev </a> </div--> 
	<div class="linkButtonRight"> <a href="pageOnePhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
