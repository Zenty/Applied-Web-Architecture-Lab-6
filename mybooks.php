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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,400i,600,700|Ubuntu+Condensed|Ubuntu:400,700" rel="stylesheet">
	<script src="https://use.fontawesome.com/9454bce12e.js"></script>
</head>
<body>

	<!--  HEADER  -->
	<?php include('header.php'); 

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

        if ($db->connect_error) {
            echo "could not connect: " . $db->connect_error;
            printf("<br><a href=index.php>Return to home page </a>");
            exit();
        }

    $query = "SELECT * FROM book_authors INNER JOIN books ON books.bookid = book_authors.bookid INNER JOIN authors ON authors.authorid = book_authors.authorid WHERE reserved LIKE '1'";

	?>

	<!--  CONTENT  -->
	<main>
		<section class="col1-2-section">
			<div class="container">
				<?php
					if (isset($_GET) && !empty($_GET) && isset($_GET['bookid']) && isset($_GET['booktitle'])) {
                
		                $bookid = addslashes(trim($_GET['bookid']));
                		$booktitle = addslashes(trim($_GET['booktitle']));

                		$stmt = $db->prepare(" UPDATE books SET reserved = NULL, duedate = NULL WHERE bookid = ? AND title = ?");
		                $stmt->bind_param('is', $bookid, $booktitle);
		                $stmt->execute();

		                echo "<p class='returned'>You have returned the book <i style='color: #dc9393'> $booktitle</i></p>";
		            }

					$stmt = $db->prepare($query);
	                $stmt->bind_result($bookid, $authorid, $date, $bookid, $title, $onloan, $duedate, $isbn, $pages, $authorid, $author, $ssn);
	                $stmt->execute();
	                               
	                echo '<div class="container no-top-padding">';
	                echo '<table>';
	                echo '<tr><th>Title</th><th>Author</th><th>Reserve</th></tr>';
	                while ($stmt->fetch()) {
	                    echo "<tr>";
	                    echo    "<td> $title </td><td> $author </td><td><a class='return' href='?bookid=" . urlencode($bookid) . "&booktitle=". urlencode($title) . "'> Return </a></td>";
	                    echo "</tr>";
	                }
	                echo "</table>";
	                echo "</div>";
	            
            	?>
			</div>
		</section>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>