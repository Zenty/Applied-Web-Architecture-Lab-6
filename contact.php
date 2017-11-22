<!DOCTYPE html>
<head>
	<!--  META DATA  -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8; lang=en">
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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
	<script src="https://use.fontawesome.com/9454bce12e.js"></script>
</head>
<body>

	<!--  HEADER  -->
	<?php include('header.php'); ?>

	<!--  CONTENT  -->
	<main>
		<section class="col1-2-section">
			<div class="container">
				<form>
					<input type="text" name="name" placeholder="Name" required><br>
					<input type="text" name="email" placeholder="Email" required><br>
					<input type="text" name="subject" placeholder="Subject" required><br>
					<textarea rows="4" required></textarea><br>
					<input type="submit" name="submit" value="Submit">
				</form>
			</div>
		</section>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>