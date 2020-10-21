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

function getTopics($db)
{
    $sqlString = "SELECT * FROM topics";
    $parameters = array();
    return getSqlResults($db, $sqlString, $parameters);
}

function insertSrcipture($db)
{
    if (!isset($_POST['book'])) {
        return;
    }
    $book = htmlspecialchars($_POST['book']);
    $chapter = htmlspecialchars($_POST['chapter']);
    $verse = htmlspecialchars($_POST['verse']);
    $content = htmlspecialchars($_POST['content']);
    $topicIds = Array();
    if (isset($_POST['new-topic'])) {
        $sqlString = "INSERT INTO topics (name) VALUES (:name)";
        $name = htmlspecialchars($_POST['new-topic-name']);
        $parameters = array(":name" => $name);
        insertSqlStatement($db, $sqlString, $parameters);
        $topicIds[] = $db->lastInsertId('topics_id_seq');
    }
    $dbTopics = getTopics($db);
    foreach ($dbTopics as $row) {
        $id = $row['id'];
        $dbTopic = $row['name'];
        if (isset($_POST[$dbTopic])) {
//        $id = htmlspecialchars($_POST[$dbTopic]);
            $topicIds[] = $id;
        }
    }

    $sqlString = "INSERT INTO Scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :scripContent)";
    $parameters = array(":book" => $book, ":chapter" => $chapter, ":verse" => $verse, ":scripContent" => $content);
    insertSqlStatement($db, $sqlString, $parameters);

    $scripId = $db->lastInsertId('scriptures_id_seq');

    foreach ($topicIds as $topicId) {
        $sqlString = "INSERT INTO scripture_topics (scriptureId, topicsId) VALUES( :scripId, :topicId)";
        $parameters = array(":scripId" => $scripId, ":topicId" => $topicId);
        insertSqlStatement($db, $sqlString, $parameters);
    }
}
