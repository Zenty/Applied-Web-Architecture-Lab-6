SELECT *
FROM book_authors
INNER JOIN books ON books.bookid = book_authors.bookid
INNER JOIN authors ON authors.authorid = book_authors.authorid