<?php
require_once '../modules/book-activity/ReadActRepository.php';
require_once '../modules/book_identification/BookRepository.php';
require_once 'header.php'
?>
<link rel="stylesheet" href="my-books.css">
<!--this part is for sorting the books either by book title or by start date-->
<div class="row">
    <div class="col-md-5">
<!--this is the drop-down menu to select the column to order by-->
        <form method="post" action="my-books.php">
            <div class="form-group d-flex align-items-center">
                <label for="exampleFormControlSelect1" id="sort">Sort</label>
                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                    <option value="start_date">Start Date</option>
                    <option value="title">Book Title</option>
                </select>
            </div>

    </div>

    <div class="col-md-5">
<!--this part is for selecting if it is ascending order or descending-->
        <div class="form-group d-flex align-items-center">
            <label>Order by:</label>
            <div class="form-check d-flex align-items-center ml-3">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="desc" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Descending
                </label>
            </div>
            <div class="form-check d-flex align-items-center ml-3">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="asc">
                <label class="form-check-label" for="exampleRadios2">
                    Ascending
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<!--this is the table that contains the books added by the user-->

<table >
    <tr>
        <th>Cover</th>
        <th>Title</th>
        <th>Author</th>
        <th>Rating</th>
        <th>Status</th>
        <th>Starting Date</th>
    </tr>

<?php
    $readActRepository = new ReadActRepository();
    $bookRepository = new BookRepository();
    //change user1 with the user connecting
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sort = $_POST["sort"];
        $orderBy = $_POST["exampleRadios"];

    $list = $readActRepository->find(['username' => 'user1'],['order_by'=>[$sort=>$orderBy]]);

    foreach ($list as $element) {
        $book = $bookRepository->find(['ISBN' => $element->ISBN]);
        echo "<tr>";
        echo "<td><img src='" . $book->picture . "' alt='Book Cover'></td>";
        echo "<td>" . $book->title . "</td>";
        echo "<td>" . $book->author . "</td>";
        echo "<td>" . $book->rating . "</td>";
        echo "<td>" . $element->status . "</td>";
        echo "<td>" . $element->start_date . "</td>";
        echo "</tr>";
    }
    }
    ?>
</table>



</body>
</html>




