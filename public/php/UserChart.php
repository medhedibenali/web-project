<?php
require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$username = $_GET['username'];
$status = $_GET['status'];
$TagsRepo = new TagsRepository();
// Getting stat data for my first pie chart  
$genres = [];

$sum = 0;

// Modify each key with their number of occurences in the database
$Results = $TagsRepo->getSortedTags($username, $status);

foreach ($Results as $Result) {
    $genres[$Result->tag] = $Result->Total;
    $sum += $Result->Total;
}

// Get rid of null values

$genres = array_filter($genres, function ($value) {
    return $value != 0;
});

if (!empty($genres) || !$sum) {
    foreach ($genres as $genre => $value) {
        $genres[$genre] = ($genres[$genre] / $sum) * 100;
        $genres[$genre] = number_format($genres[$genre], 2);
    }
}

$jsonData = json_encode($genres);

echo $jsonData;
