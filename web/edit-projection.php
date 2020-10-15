<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
<!--    <link rel="stylesheet" type="text/css" href="./03-prove/assign04.css">-->
<!--    <link rel="stylesheet" type="text/css" href="./03-prove/assign08.css">-->
    <link rel="stylesheet" type="text/css" href="assign07.css">
</head>
<body>
<div id="projection-selector">

<?php
require "connect-db.php";

function getEntriesForOne($db, $projection)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT name, entry_type, amount_cents, start_date, end_date, repeats, repeat_frequency 
                FROM proj_entries WHERE projection_id = (SELECT id FROM projections WHERE name = :projection)
                ORDER BY entry_type DESC");
        $statement->bindValue(':projection', $projection);
        $statement->execute();
        $entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $entries;
}

function getBankAccountsForOne($db, $projection)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT * FROM bank_accounts WHERE projection_id = (SELECT id FROM projections WHERE name = :projection)");
        $statement->bindValue(':projection', $projection);
        $statement->execute();
        $entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $entries;
}

function getProjectionList($db)
{
    try {
        $statement = $db->prepare(
            "SELECT name, created, length FROM projections");
        $statement->execute();
        $projectionList = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $projectionList;
}

function getPrettyNames($db)
{
    try {
        $statement = $db->prepare(
            "SELECT name, pretty_name FROM pretty_names");
        $statement->execute();
        $prettyNames = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $prettyNames;
}

function printSqlResults($results)
{
    echo "<table><tr>";
    foreach ($results[0] as $key => $value) {
        echo "<td>" . $key . "</td>";
    }
    echo "</tr>";

    foreach ($results as $row) {
        echo "<tr>";
        foreach ($row as $data) {
            echo "<td>" . $data . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
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
