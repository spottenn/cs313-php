<?php
require_once 'connect-db.php';
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

function insertSqlStatement($db, $sqlString, $parameters)
{
    try {
        $statement = $db->prepare($sqlString);
        foreach ($parameters as $paramName => $value) {
            $statement->bindValue($paramName, $value);
        }
        $statement->execute();

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    return;
}

function getProjectionsForOne($db, $username)
{
    $sqlString = "SELECT id, name, created, length FROM projections 
        WHERE user_id = (SELECT id FROM users WHERE username = :username)";
    $parameters = array(":username" => $username);
    return getSqlResults($db, $sqlString, $parameters);
}

function getProjectionDetailsById($db, $projectionId)
{
    $sqlString = "SELECT id, user_id, name, created, length FROM projections 
        WHERE id = :id";
    $parameters = array(":id" => $projectionId);
    return getSqlResults($db, $sqlString, $parameters)[0];
}

function getProjectionId($db, $username, $projection)
{
    $sqlString = "SELECT id FROM projections WHERE name = :projection 
                             AND user_id = (SELECT id FROM users WHERE username = :username)";
    $parameters = array(":projection" => $projection, ":username" => $username);
    $idArray = getSqlResults($db, $sqlString, $parameters);
    return $idArray[0]['id'];
}

function getEntriesForOne($db, $projectionId)
{
//    $projection = htmlspecialchars($_POST['projection-name']);
    try {
        $statement = $db->prepare(
            "SELECT name, entry_type, amount_cents, start_date, end_date, repeats, repeat_frequency 
                FROM proj_entries WHERE projection_id = (SELECT id FROM projections WHERE id = :projection_id)
                ORDER BY entry_type DESC");
        $statement->bindValue(':projection_id', $projectionId);
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
            "SELECT name, type, amount_cents FROM bank_accounts WHERE projection_id = (SELECT id FROM projections WHERE id = :projection_id)");
        $statement->bindValue(':projection_id', $projectionId);
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
        $prettyNameRows = $statement->fetchAll(PDO:: FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
    }
    $prettyNames = array();
    foreach ($prettyNameRows as $row) {
        $prettyNames[$row['name']] = $row['pretty_name'];
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

function insertProjEntry($db, $sqlParameters)
{
    $sql = "INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
    repeat_frequency)
VALUES (:projection_id, :type, :name, :amount_cents, :start_date, :end_date, :repeats, :repeat_frequency);";
    insertSqlStatement($db, $sql, $sqlParameters);
}


function insertBankAccount($db, $sqlParameters)
{
    $sql = "INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES (:projection_id, :name, :type, :amount_cents)";
    insertSqlStatement($db, $sql, $sqlParameters);
}

function createUser($db, $username)
{
    $parameter = array(':username' => $username);
    $insertSql = "INSERT INTO users (username, created) VALUES (:username, current_timestamp);";
    insertSqlStatement($db, $insertSql, $parameter);
}

function getUserId($db, $username)
{
    $parameter = array(':username' => $username);
    $sql = "SELECT id FROM users WHERE username = :username";
    $results = getSqlResults($db, $sql, $parameter);
    if (isset($results[0]['id'])) {
        return $results[0]['id'];
    }
    return null;
}