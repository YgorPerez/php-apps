<?php
ini_set('sendmail_from', 'myself@my.com');
ini_set('SMTP', 'mail.bigpond.com');
ini_set('smtp_port', 25);

// session_start();
// $_SESSION['name'] = htmlentities($_POST['name']);
// $_SESSION['email'] = htmlentities($_POST['email']);
// $name = $_SESSION['name'];
// $email = $_SESSION['email'];
// print $name;
// print $email;

// message vars
$msg = '';
$msgClass = '';
echo '<script>';
echo 'console.log("test0");';
echo '</script>';

// Check for submit
if (filter_has_var(INPUT_POST, 'submit')) {
	// get form data
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

	print $name;
	print $email;
	print $message;

	echo '<script>';
	echo 'console.log("test1");';
	echo '</script>';

	// Check required fields
	if (!empty($name) && !empty($email) && !empty($message)) {
		// Passed
		// Check email
		echo '<script>';
		echo 'console.log("test2");';
		echo '</script>';
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			// Failed
			$msg = 'Please use a valid email';
			$msgClass = 'alert-danger';
		} else {
			// Passed
			$toEmail = 'perezygor@gmail.com';
			$subject = 'Contact Request From ' . $name;
			$body =
				'<h2>Contact Request</h2>
                            <h4>Name</h4><p>' .
				$name .
				'</p>
                            <h4>Email</h4><p>' .
				$email .
				'</p>
                            <h4>Message</h4><p>' .
				$message .
				'</p>
                        ';
			// Email Headers
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
			// Additional Headers
			$headers .= 'From: ' . $name . '<' . $email . '>' . "\r\n";

			if (mail($toEmail, $subject, $body, $headers)) {
				// Email sent
				$msg = 'Your email has been sent';
				$msgClass = 'alert-success';
			} else {
				// Failed
				$msg = 'Your email was not sent';
				$msgClass = 'alert-danger';
			}
		}
	} else {
		// Failed
		$msg = 'please fill in the required fields';
		$msgClass = 'alert-danger';

		echo '<script>';
		echo 'console.log("test3");';
		echo '</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">My Website</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php if ($msg != ''): ?>
                <div class="alert     
                    <?php echo $msgClass; ?>">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <form method"POST" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" 
					value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" 
					value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control">
						<?php echo isset($_POST['message']) ? $message : ''; ?>
					</textarea>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary" value="Submit">
                    Submit</button>
                </form>
        </div>
    </body>

</html>