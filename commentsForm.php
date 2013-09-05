<?php

$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
	if($link)
	{
		$inf = "SELECT * FROM `fc572UserComments` WHERE page = '".stripslashes($_SERVER['REQUEST_URI'])."' ORDER BY date ASC"; 
			 $info = mysqli_query($link, $inf); 
				 if(!$info) die(mysqli_error($link)); 
	}
	$info_rows = mysqli_num_rows($info); 
			if($info_rows > 0) { 
			   echo '<h4>Comments:</h4>'; 
			   echo '<table width="80%">'; 
					$count=1;
					while($info2 = mysqli_fetch_object($info)) {  					
						echo '<tr>';  						
						echo '<td> '.$count.") ".stripslashes($info2->username).' 
						<div align="left"> said on '.date('d/m/y @ H:i',strtotime($info2->date)).'</div></td>';					
						echo '</tr><tr>'; 
						echo '<td colspan="2">  '.stripslashes($info2->comment).' </td>'; 
						echo '</tr>'; 
						$count+=1;
					}//end while 
				
				echo '</table>';
			} 
			else{
				echo 'Be the first to leave a comment <br>'; 
			}
			mysqli_close($link);
	
	if(isset($_POST['submit']))
	{
		if(validatefcInput($_POST['username']))
		{
			if(validatefcInput($_POST['contact']))
			{
				if(validatefcInput($_POST['subject']))
				{
						if(validatefcInput($_POST['comment']))
						{
							$username = $_POST['username'];
							$contact = $_POST['contact'];
							$subject = $_POST['subject'];
							$comment = $_POST['comment'];
							$page = stripslashes($_SERVER['REQUEST_URI']); 
							$ip = $_SERVER['REMOTE_ADDR'];
							
							if(connectAndAddTofc572Comments($username,$contact,$subject,$comment,$page, $ip))
							{
								//echo "The records have been inserted";
								 echo '<script>parent.window.location.reload(true);</script>';
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
					echo "Please insert a valid subject <br/>";
				}
			}
			else
			{
				echo "Please insert a valid contact <br/>";
			}
		}
		else
		{
			echo "Please insert a valid username <br/>";
		}
	}
else
{
?>
	<form name="comments" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 

	<table width="80%" border="0" cellspacing="0" cellpadding="0"> 

	   <tr>  
		  <td><div align="right">Username:   </div></td>  
		   <td><input name="username" id="username" type="text" size="30" value=""></td> 
		   
	   </tr> 
		<tr>  
			<td><div align="right">Contact:   </div></td> 
			<td><input type="text" name="contact" id="contact" size="30" value=""> <i>(email or url - will not be shown)</i></td> 
		</tr> 
		<tr>
			<td><div align="right">Subject:   </div></td> 
			<td><input type="text" name="subject" id="subject" size="30" value=""></td> 
		</tr> 
		<tr> 
		    <td><div align="right">Comment:   </div></td> 
		    <td><textarea name="comment" id="comment" cols="45" rows="5" wrap="VIRTUAL"></textarea></td> 
		</tr> 
		<tr>  
		    <td></td> 
		    <td colspan="2"><input type="reset" value="Reset Fields">      
			<input type="submit" name="submit" value="Add Comment"></td> 
		</tr> 
	  </table> 
	</form> 

<?php 
}

function connectAndAddTofc572Comments($username,$contact,$subject,$comment,$page, $ip)
{
	$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
	if($link)
	{
		mysqli_query($link,"INSERT INTO fc572UserComments(page, username, subject, comment, contact, ip) VALUES ('$page', '$username', '$subject', '$comment', '$contact', '$ip') ");
			
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

function validatefcInput($validateMe)
{
	if(empty($validateMe))
	{
		return False;
	}
	elseif(validatefcField($validateMe))
	{
		return False;
	}
	else
	{
		return True;
	}
}


function validatefcField($validateMe)
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
?>