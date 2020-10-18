<?php

function getSqlResults($db, $sqlString, $parameters)
{
    try {
        $statement = $db->prepare($sqlString);
        foreach ($parameters as $paramName => $value) {
            $statement->bindValue($paramName, $value);
        }
        $statement->execute();
        $entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $entries;
}

function getProjectionsForOne ($db, $username) {

    $sqlString = "SELECT id, name, created, length FROM projections 
        WHERE user_id = (SELECT id FROM users WHERE username = :username)";
    $parameters = array(":username" => $username);
    return getSqlResults($db, $sqlString, $parameters);
}

function getProjectionId($db, $username, $projection)
{
    $sqlString = "SELECT id FROM projections WHERE name = :projection 
                             AND user_id = (SELECT id FROM users WHERE username = :username)";
    $parameters = array(":projection" => $projection, ":username" => $username);
    $idArray = getSqlResults($db, $sqlString, $parameters);
    echo "idArray" . print_r($idArray);
    echo  "idArray[1]['id'];" . $idArray[1]['id'];
    return $idArray[1]['id'];
}

function getEntriesForOne($db, $projectionId)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT name, entry_type, amount_cents, start_date, end_date, repeats, repeat_frequency 
                FROM proj_entries WHERE projection_id = (SELECT id FROM projections WHERE id = :projectionId)
                ORDER BY entry_type DESC");
        $statement->bindValue(':projectionId', $projectionId);
        $statement->execute();
        $entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return $entries;
}

function getBankAccountsForOne($db, $projectionId)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT * FROM bank_accounts WHERE projection_id = (SELECT id FROM projections WHERE id = :projectionId)");
        $statement->bindValue(':projectionId', $projectionId);
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
            "SELECT id, name, created, length FROM projections");
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