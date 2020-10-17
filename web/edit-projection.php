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
require "connect-db-local.php";
require "db-helper.php";

function printNiceEntry($entry) {
    echo "<div><table><tr>";

    echo "<td>" . $entry['start_date'] . "</td>";
    echo "<td>" . $entry['name'] . "</td>";

    echo "<td>";
    if ($entry['entry_type'] = "income") echo "+";
    else echo "-";

    echo "</tr></table></div>";
}

$projection = htmlspecialchars($_POST['projection-name']);
$username = htmlspecialchars($_POST['username']);
$projectionId = getProjectionId($db, $username, $projection);



$entries = getEntriesForOne($db, $projectionId);
printSqlResults($entries);
print_r($entries);


echo "<br/>";
$bankAccounts = getBankAccountsForOne($db, $projectionId);
printSqlResults($bankAccounts);
print_r($bankAccounts);


echo "<br/>";
$projectionList = getProjectionList($db);
printSqlResults($projectionList);


//print_r($entries);

?>
</div>
</body>
