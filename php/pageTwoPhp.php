<?php include "../templates/top.php";?>
		<strong> Forms in PHP </strong>
		<p>
		So here we are with forms! Let's create one.
		Below there is a form here where you can insert the required fields, amongst which I have inserted your_key;
		The idea is that with that key you can later on use the API that I will create to retrieve your comment. 
		Then once this is doable, I am going to create the code in selenium WebDriver to test the all process.
		I though this would be a nice exercise to do to learn/sharpen some skills.
		<br/>
		Please note that the your_key is the primary key in the database, so make it unique to avoid errors
		Also <strong> DO NOT USE your real passwords, </strong> this site is not secure
		<br/>
	<br/>
		<form name="pageTwophp" id="pageTwoPhpId" action="" method="post">
			<label>Name:</label> <input id="formInputFormat" type="text" name="name" id="name"  maxlength=25 size=30 tabindex=1/></br>
			<label>Surname:</label> <input id="formInputFormat" type="text" name="surname" id="surname" maxlength=25 size=30 tabindex=2 /></br>
			<label>Your_Key:</label> <input v type="text" name="key" id="key" maxlength=25 size=30 tabindex=3 /></br>
			<label>Email:</label> <input id="formInputFormat" type="text" name="email" id="email" maxlength=50 size=50 tabindex=4 /></br>
			<label>Comment:</label> <textarea id="formInputFormat" name="comment" id="comment" maxlength=255 rows=5 cols=50 tabindex=5 ></textarea></br>
			
			<input type="submit" name="submit" id="submit" value="Send form"  />
		</form>
		<?php
		if(isset($_POST['submit']))
		{
			include "doStuffWithForm.php"	;
		}
		?>
		<br/><br/>
		This form now looks ok, but before it was really ugly. In order to make it pretty, you need to style each element; then the browser will
		combine them for you. So I have styled the form itself, then the label (name, surname, email and comment) and then I have applied some
		more style to the input fields. In this way the forms looks a bit nicer than just few fields put together.
		<br/>
		The code below is the code behind the scene for the above form.
		This code validates that the fields are not empty and that the characters accepted are only alphanumeric, spaces, the at sign '@' and the dot '.'
</br>
<textarea readonly rows=20 cols=95>
&lt;?php
//in here it should send the value of the form to a database
if($_POST['name'])
{
	$name = $_POST['name'];
	echo validateField($name)."&lt;br/&gt;";
}
else
{
	echo "Please insert a valid name &lt;br/&gt;";
}
if($_POST['surname'])
{
	$surname = $_POST['surname'];
	echo validateField($surname)."&lt;br/&gt;";
}
else
{
	echo "Please insert a valid surname &lt;br/&gt;";
}
if($_POST['key'])
{
	$key = $_POST['key'];
	echo validateField($key)."&lt;br/&gt;";
}
else
{
	echo "Please insert a valid key &lt;br/&gt;";
}
if($_POST['email'])
{
	$email = $_POST['email'];
	echo validateField($email)."&lt;br/&gt;";
}
else
{
	echo "Please insert a valid email &lt;br/&gt;";
}
if($_POST['comment'])
{
	$comment = $_POST['comment'];
	echo validateField($comment)."&lt;br/&gt;";
}
else
{
	echo "Please insert a valid comment &lt;br/&gt;";
}
function validateField($validateMe)
{
	if (preg_match("/[^a-z,A-Z,0-9,' ','@','.']/", $validateMe, $matches)) 
	{
		return "Special chars such as " .$matches[0] ." are not allowed";
	}
}
?&gt;
</textarea></br>
Although it seems a bit crappy that each check is on a separate line, it is done on purpose. I hate those forms that tell you one error at the time
I prefer having all the errors at once so that I can correct them and then go on with my life.

Now that the form is done, let's go and create a mySql database to store the comment.

		</p>
		
	<div class="linkButtonLeft"> <a href="pageOnePhp.php"> Prev </a> </div> 
	<div class="linkButtonRight"> <a href="pageThreePhp.php"> Next </a> </div>
		</div><!--centre-->
<?php include "../templates/bottom.php"?>
