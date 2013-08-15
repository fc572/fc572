<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> PHP MySQL </title>
	</head>

	<body>
		<div id="marginTop"><?php include "../menu.php";?></div>
	<div id="leftColumn"></div>
	<div id="centre">
		<strong> MySQL in PHP </strong>
		<p>
		I have create a MySQL database and now I need to connect to it in order for the form to save the form details.
		In doing so I have had to change the code written in the previous page as it was not good when wanting to pass the values to the db.
		So here it is the new code<br/>
<pre>
<code>
&lt;?php

if(validateInput($_POST['name']))
{
	if(validateInput($_POST['surname']))
	{
		if(validateInput($_POST['key']))
		{
			if(validateInput($_POST['email']))
			{
				if(validateInput($_POST['comment']))
				{
					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$your_key = $_POST['key'];
					$email = $_POST['email'];
					$comment = $_POST['comment'];
					
					if(connectToCommentsDb($name,$surname,$your_key,$email,$comment))
					{
						echo "The records have been inserted";
					}
					else
					{
						echo "FAILURE";
					}
				}
				else
				{
					echo "Please insert a valid comment &lt;br/&gt;";
				}
			}
			else
			{
				echo "Please insert a valid email &lt;br/&gt;";
			}
		}
		else
		{
			echo "Please insert a valid key &lt;br/&gt;";
		}
	}
	else
	{
		echo "Please insert a valid surname &lt;br/&gt;";
	}
}
else
{
	echo "Please insert a valid name &lt;br/&gt;";
}

function validateInput($validateMe)
{
	if(empty($validateMe))
	{
		return False;
	}
	elseif(validateField($validateMe))
	{
		return False;
	}
	else
	{
		return True;
	}
}


function validateField($validateMe)
{
	if (preg_match("/[^a-z,A-Z,0-9,' ','@','.']/", $validateMe, $matches)) 
	{
		return True; //the regex is in negative, so if there are special chars is meant to return true so that the validation can fail
	}
	else
	{
		return False;
	}
}

function connectToCommentsDb($name,$surname,$your_key,$email,$comment)
{
	$link = mysql_connect("localhost", "*******", "*******");
	if($link)
		{
			if(mysql_select_db("comments",$link))
			{
				mysql_query("INSERT INTO usercomments(name,surname, your_key, email, comment) VALUES ('$name','$surname','$your_key','$email','$comment')");
				
				$insertedValueCount = mysql_affected_rows();
				echo "The total amount of rows affected was " .$insertedValueCount ."&lt;br/&gt;";
				
				mysql_close();
				if($insertedValueCount >= 1)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}	
		}
		else
		{
			die("The connection to CommentsDB has failed");
		}
}

?&gt;
</pre>
</code>
		</p>
		
		<div class="chapter"> <div class="prev"> <a href="pageTwoPhp.php"> Previous </a> </div> <div class="next"> <a href=".php"> Next </a> </div></div>
	</div>
	<div id="rightColumn"></div>
	<div id="footer"></div>
	</body>
</html>