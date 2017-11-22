	<?php include('config.php'); ?>

	<header>
		<?php if(isset($_SESSION['user'])) { ?>
			<div id="admin_panel">
				<nav>
					<ul>
						<a href="./admin_books.php" class="<?php echo ($current_page == 'admin_books.php' || $current_page == '') ? 'active' : NULL ?>"><li>Books</li></a>
						<a href="./admin_image.php" class="<?php echo ($current_page == 'admin_image.php' || $current_page == '') ? 'active' : NULL ?>"><li>New Image</li></a>
					</ul>
				</nav>
			</div>
		<?php } ?>
		<div id="top">
			<div id="logo"><a href="./index.php">Book Club</a></div>
			<nav>
				<ul>
					<a href="./index.php" class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>"><li>Home</li></a>
					<a href="./about.php" class="<?php echo ($current_page == 'about.php' || $current_page == '') ? 'active' : NULL ?>"><li>About Us</li></a>
					<a href="./browse.php" class="<?php echo ($current_page == 'browse.php' || $current_page == '') ? 'active' : NULL ?>"><li>Browse Books</li></a>
					<a href="./mybooks.php" class="<?php echo ($current_page == 'mybooks.php' || $current_page == '') ? 'active' : NULL ?>"><li>My Books</li></a>
					<a href="./gallery.php" class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : NULL ?>"><li>Gallery</li></a>
					<a href="./contact.php" class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : NULL ?>"><li>Contact</li></a>
					<?php if(!isset($_SESSION['user'])) { ?>
					<a href="./login.php" class="<?php echo ($current_page == 'login.php' || $current_page == '') ? 'active' : NULL ?>"><li>Login</li></a>
					<?php } else { ?>
					<a href="./logout.php" class="<?php echo ($current_page == 'logout.php' || $current_page == '') ? 'active' : NULL ?>"><li>Logout</li></a>
					<?php } ?>
				</ul>
			</nav>
		</div>
		<div id="header-image"></div>
	</header>