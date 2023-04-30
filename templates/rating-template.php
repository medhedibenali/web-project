<?php
if (!isset($_SESSION['username'])) {
    ?>
    <div class="no-user-error">
        Please <a href="../public/sign-in.php">login</a> or <a href="../public/sign-in.php">signup</a> to post review
    </div>
    <?php
}
else {
?>

<form name ="rating-form" action="../public/php/AddRating.php" onclick="document.forms['rating-form'].submit()" method="post">
    <!--    rating template-->
    <div class="rate">
        <input type="radio" id="rating10" name="rate" value="5" /><label for="rating10" title="5 stars"></label>
        <input type="radio" id="rating9" name="rate" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
        <input type="radio" id="rating8" name="rate" value="4" /><label for="rating8" title="4 stars"></label>
        <input type="radio" id="rating7" name="rate" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
        <input type="radio" id="rating6" name="rate" value="3" /><label for="rating6" title="3 stars"></label>
        <input type="radio" id="rating5" name="rate" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
        <input type="radio" id="rating4" name="rate" value="2" /><label for="rating4" title="2 stars"></label>
        <input type="radio" id="rating3" name="rate" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
        <input type="radio" id="rating2" name="rate" value="1" /><label for="rating2" title="1 star"></label>
        <input type="radio" id="rating1" name="rate" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>
    </div>
    <input type="hidden" value="<?= $isbn ?>" name="isbn">
</form>
    <?php
}
?>