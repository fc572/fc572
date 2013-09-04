<!DOCTYPE html> 
<html>
	<head>
		<link href="../style.css" rel="stylesheet" type="text/css" >
		<title> PHP MySQL </title>
	</head>

	<body id="blackColor">
		<div id="marginTop" class="box" onclick="window.location.href='../index.php'"><?php include "../menu.php";?></div>
			
		<div id="rightColumn" class="box"> </div>
		<div id="centre" class="box">
		<strong> MySQL in PHP </strong>
		<p>
		I have create a MySQL database and now I need to connect to it in order for the form to save the form details.
		In doing so I have had to change the code written in the previous page as it was not good when wanting to pass the values to the db.
		So here it is the new code<br/>
</br>
<textarea readonly rows=20 cols=95>
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
					
					if(connectAndAddToComments($name,$surname,$your_key,$email,$comment))
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

function connectAndAddToComments($name,$surname,$your_key,$email,$comment)
{
	$link = mysqli_connect("localhost", "userName", "password", "databaseName");
	if($link)
		{
			mysqli_query($link,"INSERT INTO usercomments(name,surname, your_key, email, comment) VALUES ('$name','$surname','$your_key','$email','$comment')");
				
			$insertedValueCount = mysqli_affected_rows($link);
			echo "The total amount of rows affected was " .$insertedValueCount ."<br/>";
			
			mysqli_close($link);
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
			echo "Can't connect to localhost. Error: %s\n", mysqli_connect_error();
		}
}


?&gt;
</textarea>
<br/>
So what is this script doing? It starts by validating that there is content and that there are no nasty special chars in the value inserted into the form
with the statement if(validateInput($_POST['name'])) where the $_POST is retrieving the value for us; Then if there are no surprises, the retrieved values get
assigned to a new variable so that it can be passed to the connectAndAddToComments function. This function also return True if has been successful, false otherwise.
A very unhelpful message 'FAILURE' is displayed but for the time being I am happy with that. <br/>
Inside connectAndAddToComments the magic happens. First you have to connect to the database so I use predefined functions from PHP library called mysqli_connect()
Once the connection is active, we are connected to the database itself. Again a function from the PHP library, comes handy
and I use mysqli_query() (guess where is this function from??) and I use sql syntax INSERT INTO to create a new record with the values that are coming from the web form.
Then I need to close the connection to the db and to finish off I return the number of affected rows for displaying.<br/>
Now let's move to writing the API that will retrieve the comments from the database.
		</p>
		
		<div class="chapter"> 
			<div class="prev"> <a href="pageTwoPhp.php"> Previous </a> </div> 
			<div class="next"> <a href="pageFourPhp.php"> Next </a> </div>
		</div>
	</div>
	</div>
	<div id="footer" class="box"><?php include "../commentsForm.php";?></div>
	</body>
</html>
