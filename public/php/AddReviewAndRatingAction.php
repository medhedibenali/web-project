<?php
session_start();
/*temporary until @mohamedHedi pushes the login page*/
include_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
include_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
include_once dirname(__FILE__, 3) . '/modules/book_identification/UserReviewsRepository.php';
$isbn = $_POST['isbn'];
$review = $_POST['review'];
$rating = $_POST['rate'];
$username = $_SESSION['username'];
$bookRepo = new BookRepository();
$userReviewsRepo = new UserReviewsRepository();
if (!($userReviewsRepo->find(["isbn" => $isbn, "username" => $username]))) {
    $userReviewsRepo->insert(["isbn" => $isbn, "username" => $username, "review" => $review, "rating" => $rating]);
} else {
    $userReviewsRepo->update(["isbn" => $isbn, "username" => $username], ["review" => $review, "rating" => $rating]);
}
header("Location: " . $_SERVER['HTTP_REFERER']);
