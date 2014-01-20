<?php include "../templates/top.php";?>

		<strong> API in PHP </strong>
		<p>
		In this page I am going to write the code to retireve one of the codes for HTTP requests.
		What I have also allows to send the URI http://www.fc572.me/php/status.php?requesting-status=200 then the API will return 
		the description of the code you have requested alongside the numerical value.

		This is the code that accomplish this<br/>
</br>
<textarea readonly rows=20 cols=95>
&lt;?php ob_start(); ?&gt;
  if(isset($_GET["requesting-status"]))
  {		
    $status_requested = $_GET["requesting-status"]
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
	default: $message = "ERROR this HTTP code you have request is not present in my list";
   }
	if(is_numeric($status_requested)){
	   if($status_requested == 301 || $status_requested == 303 || $status_requested == 307){
	     header("Location: http://www.fc572.me/php/pageFivePhp.php"); 
	   }
	   elseif($status_requested >= 100 && $status_requested <=102){
	      header('HTTP/1.0 200 OK', true, 200);
	   }
	   else{
	      header('HTTP/1.0 '.$status_requested.' '.$message, true, $status_requested);
	   }
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
   echo "Which status do you want?";
}
				
?&gt;
&lt;?php ob_get_flush(); ?&gt;
</textarea></br>
		I hope to comment on the code asap, also because otherwise I am going to forget..... ah ah!
		</p>
		
	<div class="linkButtonLeft"> <a href="pageFourPhp.php"> Prev </a> </div> 
	<div class="linkButtonRight"> <a href="pageSixPhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
