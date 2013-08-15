<?php

	echo "API PHP <br/>";
	$inputKey = $_GET["your_key"];
	
	$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		if ($request_method == 'get')
		{
			retrieveDataFromDb($inputKey);
		}
	
	function retrieveDataFromDb($key)
	{
		echo "<br/><br/>";
		echo "<table id=\"getApiTable\" border=2>";
		echo "<tr bgcolor=#dadada>";
		echo "<td width=\"15%\">Name</td><td width=\"15%\">Surname</td><td width=\"15%\">Your_key</td><td width=\"15%\">email</td><td width=\"15%\">comment</td>";
		echo "</tr>";
		
		$link = mysqli_connect("localhost", "fc572", "Zarathustra1111", "comments");
		if($link)
		{
			$query = "SELECT * FROM usercomments WHERE your_key = '" .$key ."'";
			
			$results = mysqli_query($link,$query);
			
			foreach($results as $result)
			{
				$name = $result['name'] ."<br/>";
				$surname = $result['surname']."<br/>";
				$your_key =  $result['your_key']."<br/>";
				$email = $result['email']."<br/>";
				$comment = $result['comment']."<br/>";
			}
			
			echo"<tr> <td width=\"15%\">".$name."</td> <td width=\"15%\">".$surname."</td><td width=\"15%\">".$your_key."</td><td width=\"15%\">".$email."</td><td width=\"15%\">".$comment."</td> </tr>";
			echo "</table>";
			unset($result);
		}
		else
		{
			echo "Can't connect to localhost. Error: %s\n", mysqli_connect_error();
		}
		mysqli_close($link);
	}
?>
