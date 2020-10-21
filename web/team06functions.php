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

function getTopics ($db) {
    $sqlString = "SELECT * FROM topics";
    $parameters = array();
    return getSqlResults($db, $sqlString, $parameters);
}


function getTopicsForOne ($db, $scripId) {
    $sqlString = "SELECT * FROM topics WHERE ";
    $parameters = array();
    return getSqlResults($db, $sqlString, $parameters);
}
