<!DOCTYPE html>
<head>
	<!--  META DATA  -->
	<meta http-equiv="Content-Type" content="text/html; lang=en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="Keyword1, Keyword2, Keyword3">
	<meta name="description" content="Website description.">
	<meta name="robots" content="index, follow">

	<!--  TITLE, FAVICON, MISC ETC  -->
	<title>Book Club</title>
	<link rel="icon" href="images/favicon.png">

	<!--  STYLES  -->
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/typography.css">
	<link rel="stylesheet" href="styles/header.css">
	<link rel="stylesheet" href="styles/footer.css">

	<!--  FONTS  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,400i,600,700|Ubuntu+Condensed|Ubuntu:400,700" rel="stylesheet">
	<script src="https://use.fontawesome.com/9454bce12e.js"></script>
</head>
<body>

	<!--  HEADER  -->
	<?php include('header.php'); ?>

	<!--  CONTENT  -->
	<main>
		<section class="col2-section">
			<?php
				@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

				if ($db->connect_error) {
				    echo "could not connect: " . $db->connect_error;
				    printf("<br><a href=index.php>Return to home page </a>");
				    exit();
				}
			?>



			<!--  LOGIN  -->
			<div class="container">
				<h2>Sign In</h2>
				<form method="POST" action="">
					<input type="hidden" name="request" value="login">

					<input id="li1" type="text" name="username" placeholder="Username" required><br>
					<input id="li2" type="password" name="userpass" placeholder="Password" required><br>
					<input type="submit" value="LOGIN">
				</form>
			</div>

			<?php
				if (isset($_POST['request'], $_POST['username'], $_POST['userpass']) && ($_POST['request'] == 'login')) {

					$uname = mysqli_real_escape_string($db, $_POST['username']);
					$upass = sha1($_POST['userpass']);

					$query = ("SELECT * FROM users WHERE username = '{$uname}' AND userpass = '{$upass}'");
				    $stmt = $db->prepare($query);
				    $stmt->execute();
				    $stmt->store_result(); 
				    $usercount = $stmt->num_rows();

				    if($usercount == 1) {
				    	# Creating Season & Cookie
				    	if(isset($_POST['remember'])) {
				    		setcookie('rememberme', $uname, time() + (365 * 24 * 60 * 60));
				    	} else {
				    		setcookie('rememberme', '', time() + (365 * 24 * 60 * 60));
				    	}

				    	$stmt = $db->prepare("SELECT * FROM users WHERE username = '{$uname}' AND userpass = '{$upass}'");
				    	$stmt->bind_result($id, $uname, $upass);
				    	$stmt->execute();

				    	while($stmt->fetch()) {
				    		$_SESSION['user'] = $id;
				    		$_SESSION['uname'] = $uname;
				    		header("Location: ./index.php");
				    	}

				    } else {
				    	#Error1 - Wrong username/password
				    	echo "<script type='text/javascript'>";
				    	echo "document.getElementById('li1').style.border ='1px solid red'; ";
				    	echo "document.getElementById('li1').title ='Wrong username/password'; ";
				    	echo "document.getElementById('li2').style.border ='1px solid red'; ";
				    	echo "document.getElementById('li2').title ='Wrong username/password'; ";
				    	echo "</script>";
				    }

				}
			?>
		</section>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>