<?php
//we need this for the reviews later
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootswatch/dist/lux/bootstrap.min.css"/>
    <link rel="stylesheet" href="../public/css/book_identity.css"/>


    <title>Book identity</title>
</head>
<body>
<?php
require "../public/php/process-book-identity.php";
$ISBN = htmlspecialchars($_GET['ISBN']);
$book=findBook($ISBN);

?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <table>
        <tr>
            <img src="<?=$book->picture?>"/>
        </tr>
        <tr>
            <div>
                title :<?=$book->title;?>
            </div>
        </tr>
        <tr>
            <div>
                author: <?=$book->author;?>
            </div>
        </tr>
        <tr>
            <div>
                Publisher :<?=$book->publisher;?>
            </div>
        </tr>

        <tr>
            <div>
                Synopsis :<?=$book->synopsis;?>
            </div>
        </tr>

        <tr>
                <div>
                   User rating: <?=getRating($book->ISBN)[0] .'('.getRating($book->ISBN)[1] .'review(s) )';?>
                </div>

        </tr>

    </table>

    <form id="addToList" action="php/add-to-list-process.php" method="post">
        <select id="actionOnBook" name="answer">
            <option value="default"></option>
            <option value="currentlyreading">currently reading</option>
            <option value="finishedreading">read</option>
            <option value="toread">want to read</option>
        </select>
        <input type="hidden" name="ISBN" value="<?=$ISBN?>">


    </form>

    <br>
    <br>

    <!-- reviews-->
    <?php
    require_once dirname(__FILE__, 2).'/public/php/reviews.php';
    ?>



<!--rating a book-->
<!--    I need to add the condition that there's a connected user to post a review!!-->
<div class="alert alert-warning">
    <?= 'share your thoughts about this book'?>;
</div>
    <?php
    require_once("../tmp/rating.php");
    ?>


<!--    review form-->
<textarea name = "review" rows="10" cols="50"></textarea>
<input type="hidden" name="ISBN" value="<?=$ISBN?>">
<br>
<button type = "submit" >
        Submit
</button >

</form>
</div>
<script src="book-identity.js"></script>
</body>
</html>






