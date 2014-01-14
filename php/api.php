<?php include "../templates/top.php";?>
<p>
		<h2> APIs </h2>
<?php
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
			$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
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
?>
</p>
	<!--div class="linkButtonLeft"> <a href="pageOnePhp.php"> Prev </a> </div--> 
	<div class="linkButtonRight"> <a href="pageOnePhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
