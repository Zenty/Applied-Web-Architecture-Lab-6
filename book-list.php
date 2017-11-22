
            <div class="container">
                <form action="#" method="GET">
                    <input type="text" name="searchitem" placeholder="Search"><br>
                    <select name="searchby">
                        <option value="searchtitle">Search by Title</option>
                        <option value="searchauthor">Search by Author</option>
                    </select>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>

            <?php

            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }

            $query = "SELECT * FROM book_authors INNER JOIN books ON books.bookid = book_authors.bookid INNER JOIN authors ON authors.authorid = book_authors.authorid WHERE reserved IS NULL";
            #$query = " SELECT * from books WHERE reserved IS NULL";

            if (isset($_GET) && !empty($_GET) && isset($_GET['searchitem'])) {
                
                $searchitem = trim($_GET['searchitem']);
                $searchitem = addslashes($searchitem);

                if($_GET['searchby'] == 'searchauthor') {
                    $query = $query . " AND author like '%" . $searchitem . "%'";
                } elseif($_GET['searchby'] == 'searchtitle') {
                    $query = $query . " AND title like '%" . $searchitem . "%'";
                }
            }

            if (isset($_GET) && !empty($_GET) && isset($_GET['bookid']) && isset($_GET['booktitle'])) {
                
                $bookid = addslashes(trim($_GET['bookid']));
                $booktitle = addslashes(trim($_GET['booktitle']));
                $date = date("Y/m/d");

                $stmt = $db->prepare(" UPDATE books SET reserved = 1, duedate = ? WHERE bookid = ? AND title = ?");
                $stmt->bind_param('sis', $date, $bookid, $booktitle);
                $stmt->execute();
            
                echo "<p class='reserved'>You have reserved the book <i style='color: #7fd27f'> $booktitle</i>, you can find all your reservations under 'My books'</p>";
            }

                $stmt = $db->prepare($query);
                $stmt->bind_result($bookid, $authorid, $date, $bookid, $title, $onloan, $duedate, $isbn, $pages, $authorid, $author, $ssn);
                $stmt->execute();
                               
                echo '<div class="container no-top-padding">';
                echo '<table>';
                echo '<tr><th>Title</th><th>Author</th><th>Reserve</th></tr>';
                while ($stmt->fetch()) {
                    echo "<tr>";
                    echo    "<td> $title </td><td> $author </td><td><a href='?bookid=" . urlencode($bookid) . "&booktitle=". urlencode($title) ."'> Reserve </a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            
            ?>