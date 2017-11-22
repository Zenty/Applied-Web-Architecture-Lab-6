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

		<?php if(isset($_SESSION['user'])) { ?>
		<section class="col1-2-section">
			<div class="container">
                <form action="#" method="POST">
                    <input type="text" name="title" placeholder="Title"><br>
                    <input type="text" name="author" placeholder="Author"><br>
                    <input type="submit" name="submit" value="Add book">
                </form>
            </div>

            <?php

            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }

            	if(isset($_POST['title'], $_POST['author'])) {
            		$title = mysqli_real_escape_string($db, $_POST['title']);
            		$author = mysqli_real_escape_string($db, $_POST['author']);

            		#$stmt = $db->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
            		#$stmt->bind_param('ss', $title, $author);
            		#$stmt->execute();

            		echo "<p class='added'>You have added the book <i style='color: #7fd27f'> $title</i></p>";
            	}

            	if (isset($_GET['type'], $_GET['bookid'], $_GET['booktitle']) && $_GET['type'] === 'delete') {
                
	                $bookid = addslashes(trim($_GET['bookid']));
	                $booktitle = addslashes(trim($_GET['booktitle']));

	                $stmt = $db->prepare("DELETE FROM books WHERE bookid = '{$bookid}'");
	                $stmt->execute();
	            
	                echo "<p class='deleted'>You have deleted the book <i style='color: #e66464'> $booktitle</i></p>";
	            }

                $stmt = $db->prepare("SELECT * FROM book_authors INNER JOIN books ON books.bookid = book_authors.bookid INNER JOIN authors ON authors.authorid = book_authors.authorid");
                $stmt->bind_result($bookid, $authorid, $date, $bookid, $title, $onloan, $duedate, $isbn, $pages, $authorid, $author, $ssn);
                $stmt->execute();
                               
                echo '<div class="container no-top-padding">';
                echo '<table>';
                echo '<tr><th>Title</th><th>Author</th><th>RESERVED</th><th>DELETE</th></tr>';
                while ($stmt->fetch()) {
                	if($onloan == NULL) { $reserved = 'No'; } else { $reserved = 'Yes'; }
                    echo "<tr>";
                    echo    "<td> $title </td><td> $author </td><td> $reserved </td><td><a class='delete' href='?type=delete&bookid=" . urlencode($bookid) . "&booktitle=". urlencode($title) ."'> DELETE </a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            
            ?>
		</section>
		<?php } else { header('Location: index.php'); } ?>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>