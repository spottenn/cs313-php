<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
    <link rel="stylesheet" type="text/css" href="./03-prove/assign04.css">
    <link rel="stylesheet" type="text/css" href="./03-prove/assign08.css">
</head>
<body>
<div id="projection-selector">

<?php
require "connect-db.php";
require "db-helper.php";

function printNiceEntry($entry) {
    echo "<div><table><tr>";


    echo "</tr></table></div>";
}

$projection = htmlspecialchars($_POST['projection-name']);
$entries = getEntriesForOne($db, $projection);
printSqlResults($entries);

echo "<br/>";
$bankAccounts = getBankAccountsForOne($db, $projection);
printSqlResults($bankAccounts);

echo "<br/>";
$projectionList = getProjectionList($db);
printSqlResults($projectionList);


//print_r($entries);

?>
</div>
</body>
