<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
<div class="container">
	<div style="color: green; font-size: 15px;"><strong>%SUCCESMAIL%</strong></div>
	<h2>Contact Form</h2>
	<form name="contactform" action=""  method="POST">
		<div style="color: #FF0000; font-size: 15px;"><strong>%NAMEERROR%</strong></div>
		<label for="name">Name:</label>
    	<input type="text" id="name" name="name" placeholder="Your name.." value="%NAME%">

    	<div style="color: #FF0000; font-size: 15px;"><strong>%MAILERROR%</strong></div>
		<label for="email">Email:</label>
    	<input type="email" id="email" name="email" placeholder="Your email.." value="%EMAIL%">

		<div style="color: #FF0000; font-size: 15px;"><strong>%SUBJECTERROR%</strong></div>
		<label for="subject">Subject:</label>
    	<select id="subject" name="subject">
			<option %SELECTED% disabled>Please select subject</option>
      		<option %SELECTED1% value="Subject1">Subject1</option>
      		<option %SELECTED2% value="Subject2">Subject2</option>
      		<option %SELECTED3% value="Subject3">Subject3</option>
    	</select>

		<div style="color: #FF0000; font-size: 15px;"><strong>%MESSEGEERROR%</strong></div>
    	<label for="messege">Message:</label>
    	<textarea id="messege" name="messege" placeholder="Type Massege" style="height:200px">%MESSEGE%</textarea>

    	<input type="submit" name="submit" value="Submit">
	</form>
</div>
</body>
</html>