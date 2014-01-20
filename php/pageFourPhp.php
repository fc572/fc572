<?php include "../templates/top.php" ?>

		<strong> API in PHP </strong>
		<p>
		In this page I am going to write a RESTful API to retrieve the values inserted into the comments form.<br/>
		To do that I am thinking to use the value inserted into the "Your Key" field as a kind of password to retrieve your record so without this 
		information there will be no records returned.
		<br/>
		So for now let's concentrate on the API.
		<br/>
		API is the acronym for Application Programming Interface. Think of an interface as a place that connects two different things. For example
		a train station is an interface between the train and the road. And as there are rules to access the train station, so there are rules in 
		the API. So this combination of rules and connection makes your program available to external sources. This is what I am going to make, an interface 			between	the database and the webPage that requires information.<br/>
		In order to write an API I need to create a new file that I will call api.php and put it on my web-server. This is the file that will be accessible from 			the outside world.
		Having read few things on the web I have now the following map to go about<br/>
		<ol>
			<li> Accept the input that comes from the outside</li>
			<li> Process the input by retrieving record from DB</li>
			<li> Return results</li>
		</ol>
		What I have also done is to create the API so that if send the URI http://www.fc572.me/php/api.php?your_key={your_key} then it will return the comment 			that you have been inserted in the previous form. 

		This is the code that accomplish this<br/>
</br>
<textarea readonly rows=20 cols=95>
&lt;?php
if(!empty($_GET["your_key"]))
{
   $inputKey = $_GET["your_key"];
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
$link = mysqli_connect("localhost", "user", "password", "databaseName");
if($link)
{
	$query = "SELECT * FROM usercomments WHERE your_key = '" .$key ."'";
	
	$results = mysqli_query($link,$query);

	$item = mysqli_fetch_assoc($results); //before that I tried with a foreach statement but it did not work as the db was returning
	//only one result, which does not allow foreach to iterate therefore the foreach was not working.

		$your_key =  $item['your_key'];
		$comment = $item['comment'];

	if(((string)($your_key)) == ((string)($key)))
	{
		echo "<br/><br/>";
		echo "<table id=\"getApiTable\" border=2>";
		echo "<tr bgcolor=#dadada>";
		echo "<td width=\"60%\">     Your_key     </td><td width=\"60%\">     comment     </td>";
		echo "</tr>";
		echo"<tr> <td width=\"60%\">".$your_key."</td><td width=\"60%\">".$comment."</td> </tr>";
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
?&gt;
</textarea></br>
		I hope to comment on the code asap, also because otherwise I am going to forget..... ah ah!
		</p>
		
	<div class="linkButtonLeft"> <a href="pageThreePhp.php"> Prev </a> </div> 
	<div class="linkButtonRight"> <a href="pageFivePhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
