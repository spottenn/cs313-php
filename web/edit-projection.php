<?php
require "connect-db.php";

function getEntriesForOne($db, $projection)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT name, amount_cents, start_date, end_date, repeats, repeat_frequency 
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

//print_r($entries);