<?php
session_start();

require "connect-db.php";
require "db-helper.php";

function printNiceEntry($entry)
{
    echo "<tr class='entry, " . $entry['entry_type'] . "'>";

    echo "<td>" . $entry['start_date'] . "</td>";
    echo "<td>" . $entry['name'] . "</td>";

    echo "<td>";
    if ($entry['entry_type'] == "income") {
        echo "+";
    }
    else {
        echo "-";
    }
    echo "$" . $entry['amount_cents']/100 . "</td>";

    echo "<td>to be computed</td>";

    echo "</tr>";
}
function printNiceEntries($entries) {
    echo "<div id='entries'><table><tr>";
    echo "<td>Date</td>";
    echo "<td>Name</td>";
    echo "<td>Amount</td>";
    echo "<td>Balance</td>";
    echo "</tr>";
    foreach ($entries as $entry) {
        printNiceEntry($entry);
    }
    echo "</table></div>";
}

$projection = htmlspecialchars($_GET['projection-name']);
$username = htmlspecialchars($_GET['username']);
$projectionId = getProjectionId($db, $username, $projection);
//echo "projection id: " . $projectionId;


$entries = getEntriesForOne($db, $projectionId);
//printSqlResults($entries);
//print_r($entries);
//
//
//echo "<br/>";
//$bankAccounts = getBankAccountsForOne($db, $projectionId);
//printSqlResults($bankAccounts);
//print_r($bankAccounts);
//
//
//echo "<br/>";
//$projectionList = getProjectionList($db);
//printSqlResults($projectionList);
//

//print_r($entries);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
    <link rel="stylesheet" type="text/css" href="./03-prove/assign04.css">
    <link rel="stylesheet" type="text/css" href="./03-prove/assign08.css">
    <link rel="stylesheet" type="text/css" href="assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
</head>
<body>
<div id="primary-div">
    <h1>Financial Projector</h1>
    <h2><?php echo $projection?></h2>
</div>
<?php printNiceEntries($entries); ?>
</body>
