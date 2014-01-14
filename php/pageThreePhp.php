<?php include "../templates/top.php";?>
		<strong> MySQL in PHP </strong>
		<p>
		I have create a MySQL database and now I need to connect to it in order for the form to save the form details.
		In doing so I have had to change the code written in the previous page as it was not good when wanting to pass the values to the db.
		So here it is the new code<br/>
</br>
<textarea readonly rows=20 cols=95>
&lt;?php
//in here it should send the value of the form to a database

		if(validateInput($_POST['key']))
		{
				if(validateInput($_POST['comment']))
				{
					$your_key = $_POST['key'];
					$comment = $_POST['comment'];
					
					if(connectAndAddToComments($your_key,$comment))
					{
						?&gt;<div class="comment box"> "The record has been inserted" </div> &lt;?php
					}
					else
					{
						echo "FAILURE";
					}
				}
				
				else 
				{
					?&gt;<div class="comment box"> "Please insert a valid comment" </div>&lt;?php
				}
		}
		else
		{
			?&gt;<div class="comment box"> "Please insert a valid key" </div> &lt;?php
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

function connectAndAddToComments($your_key,$comment)
{
	$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
	if($link)
		{
			mysqli_query($link,"INSERT INTO usercomments(your_key, comment) VALUES ('$your_key','$comment')");
				
			$insertedValueCount = mysqli_affected_rows($link);
			//echo "The total amount of rows affected was " .$insertedValueCount ."<br/>";
			
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
		
	<div class="linkButtonLeft"> <a href="pageTwoPhp.php"> Prev </a> </div> 
	<div class="linkButtonRight"> <a href="pageFourPhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
