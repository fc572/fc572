<?php
//in here it should send the value of the form to a database

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
					echo "Please insert a valid comment <br/>";
				}
			}
			else
			{
				echo "Please insert a valid email <br/>";
			}
		}
		else
		{
			echo "Please insert a valid key <br/>";
		}
	}
	else
	{
		echo "Please insert a valid surname <br/>";
	}
}
else
{
	echo "Please insert a valid name <br/>";
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
	$link = mysql_connect("localhost", "root", "");
	if($link)
		{
			if(mysql_select_db("comments",$link))
			{
				mysql_query("INSERT INTO usercomments(name,surname, your_key, email, comment) VALUES ('$name','$surname','$your_key','$email','$comment')");
				
				$insertedValueCount = mysql_affected_rows();
				echo "The total amount of rows affected was " .$insertedValueCount ."<br/>";
				
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

?>