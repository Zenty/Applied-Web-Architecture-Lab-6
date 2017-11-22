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
	<main id="gallery">
		<?php
			$images = glob("uploadedfiles/" . "*.*");
			foreach ($images as $image) {
				
				echo '<section class="col4-section">';
				echo '<div class="container">';
					echo "<a target='_blank' href='$image'><img class='image' src='$image'></a>";
				echo '</div>';
				echo '</section>';
			}
		?>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>