<?php
/***
 * Contains all useful information about the book you're exploring
 */
require dirname(__FILE__, 3) . '/modules/book_identification/ProcessBookIdentity.php';
require_once dirname(__FILE__, 3) . '/public/book-page.php';
$book = findBook($isbn);
$authorRepo=new AuthorRepository();
$picture = $book->picture;
$title = $book->title;
$author= ($authorRepo->find(['id'=>trim($book->author)]))->pen_name ;
$bio = getAuthorBio($isbn);
$publisher = $book->publisher;
if (getRating($isbn) !== null) {
    $rating = getRating($isbn)[0];
    $NbRatings = getRating($isbn)[1] . ' reviews';
} else {
    $rating = 0;
    $NbRatings = 'no reviews yet';
}
$synopsis = $book->synopsis;