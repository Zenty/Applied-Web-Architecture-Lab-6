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
			<?php 
				if (isset($_FILES['upload'])){
				    
				    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');
				    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
				    
				    $error = array ();
				    
				    if(in_array($extension, $allowedextensions) === false){
				        $error[] = 'This is not an image, upload is allowed only for images.';        
				    }
				    
				    if($_FILES['upload']['size'] > 1000000){
				        $error[]='The file exceeded the upload limit';
				    }
				    
				    if(empty($error)){
				        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");     
				    }
				    
				}
			?>
			<div class="container">
				<?php 
                   
                   if (isset($error)){
                       if (empty($error)){
                           
                           echo '<p class="added">Image has been uploaded.</p>';
                           
                       } else {

                           foreach ($error as $err){
                               echo "<p class='error'>$err</p>";
                           }
                           
                       }
                   }
                   
                ?>
                   
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="upload" /></br>
                    <input  type="submit" value="Upload" />
                </form>      
			</div>
		</section>
		<?php } else { header('Location: index.php'); } ?>
	</main>

	<!--  FOOTER  -->
	<?php include('footer.php'); ?>

</body>
</html>