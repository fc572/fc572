<?php

$link = mysqli_connect("localhost", "fc572Comments", "Zarathustra1111", "fc572Comments");
    if($link){
	$selectQuery = "SELECT * FROM `fc572UserComments` WHERE page = '".stripslashes($_SERVER['REQUEST_URI'])."' ORDER BY date ASC"; 
	$info = mysqli_query($link, $selectQuery); 
	if(!$info) die(mysqli_error($link)); 
    }
    $info_rows = mysqli_num_rows($info);

    if($info_rows > 0) { ?>
<form class="comment box" name="commentedForm" action="" method="">
<h4> Previous comments </h4>
   <?php   while($info2 = mysqli_fetch_object($info)){ ?>					

	<label>Name:</label> <input class="formInputFormat" type="text" name="username" id="username" value="<?php echo "$info2->username"?>"></input></br>
		
	<label>said&nbsp;on:</label> <input class="formInputFormat" type="text" name="date" id="date" value="<?php echo "$info2->date"?>" /></br>

	<label>Subject:</label> <input class="formInputFormat" type="text" name="subject" id="subject"value=" <?php echo "$info2->subject"?>"></input></br>

	<label>Comment:</label> <textarea class="formInputFormat" name="comment" id="comment"><?php echo trim($info2->comment)?></textarea></br></br>

<?php 

	}//end while ?>
</form>
 <?php
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
							?>
								<div class="comment box"> "Failure to connect to DB" </div>
							<?php
							}
						}
						else
						{
						?>
								<div class="comment box"> "Please insert a comment" </div>
						<?php
						}
				}
				else
				{
				?>
				   <div class="comment box"> "Please insert a Subject" </div>
				<?php
				}
			}
			else
			{
				?>
				<div class="comment box"> "Please insert a contact" </div>
				<?php
			}
		}
		else
		{
			?>
			<div class="comment box"> "Please insert a Username" </div>
			<?php
		}
	}
else
{
?>
	<form class="comment box" name="commentsForm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
	<label>Name:</label> <input required class="formInputFormat" type="text" name="username" id="username"  maxlength=25 size=25 tabindex=1/></br>
	<label>Subject:</label> <input required class="formInputFormat" type="text" name="subject" id="subject" maxlength=25 size=25 tabindex=2 /></br>
	<label>Email:</label> <input required class="formInputFormat" type="text" name="contact" id="contact" maxlength=50 size=50 tabindex=3 /></br>
	<label>Comment:</label> <textarea required class="formInputFormat" name="comment" id="comment" maxlength=255 rows=2 cols=50 tabindex=4 ></textarea></br>
	<input type="submit" name="submit" id="submit" value="Send comment"  />
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
