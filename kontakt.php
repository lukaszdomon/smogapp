<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$city = $_POST['city'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Formularz kontaktowy'; 
		$to = 'dzieffczynq@gmail.com'; 
		$subject = 'Wiadomość kontaktowa';
		
		$body ="From: $name\n E-Mail: $email\n City: $city\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		// Check if name has been entered
		if (!$_POST['city']) {
			$errCity = 'Please enter your name';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errCity && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Dziekuję! Wiadomość wysłana poprawnie.</div>';
	} else {
		$result='<div class="alert alert-danger">Przepraszamy. Spóbuj jeszcze raz.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Smog App</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SmogApp</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="legenda.html">Legenda</a></li>
        <li><a href="sklad.html">Skład smogu</a></li>
        <li><a href="https://www.google.com/maps/d/viewer?mid=1Atz3nYrc-9AGbF9AGsaRmgDxZgk&ll=50.05923274313908%2C19.951515200000017&z=14" target="_blank">Mapa stacji</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
      </ul>
    </div>
  </div>
</nav>


  			<div class="container">
  				<form class="well form-horizontal" role="form" method="post" action="index.php" id="contact_form">
				<fieldset>
    				<legend>Formularz kontaktowy</legend>

					<div class="form-group">
						<label for="name" class="col-md-4 control-label">Imię</label>
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" id="name" name="name" placeholder="Imię" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Email</label>
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					</div>

					<div class="form-group">
						<label for="city" class="col-md-4 control-label">City</label>
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
							<input type="text" class="form-control" id="city" name="city" placeholder="Kraków" value="<?php echo htmlspecialchars($_POST['city']); ?>">
							<?php echo "<p class='text-danger'>$errCity</p>";?>
						</div>
					</div>
					</div>

					<div class="form-group">
						<label for="message" class="col-md-4 control-label">Message</label>
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					</div>

					<div class="form-group">
						<label for="human" class="col-md-4 control-label">2 + 3 = ?</label>
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>

					</fieldset>
				</form> 
			</div>
	   
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
  </body>
</html>
