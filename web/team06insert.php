<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
</head>
<body>
<h1>Scripture Resources</h1>
<?php
require "connect-db.php";
require "team06functions.php";


$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);
$content = htmlspecialchars($_POST['content']);
$topicIds = Array();
$dbTopics = getTopics($db);
foreach ($dbTopics as $row) {
    $id = $row['id'];
    $dbTopic = $row['name'];
    if (isset($_POST[$dbTopic])) {
//        $id = htmlspecialchars($_POST[$dbTopic]);
        $topicIds[] = $id;
    }
}
if (isset($_POST['new-topic']) && isset($_POST['new-topic-name'])) {
    $sqlString = "INSERT INTO topics (name) VALUES (:name)";
    $name = htmlspecialchars($_POST['new-topic-name']);
    $parameters = array(":name" => $name);
    insertSqlStatement($db, $sqlString, $parameters);
    $topicIds[] =$db->lastInsertId('topics_id_seq');
}

//print_r($topicIds);
//var_dump($topicIds);
//echo "<br><br>dbTopics";
//var_dump($dbTopics);
//
//echo "<br><br>";
//var_dump($_POST);

$sqlString = "INSERT INTO Scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)";
$parameters = array(":book" => $book, ":chapter" => $chapter, ":verse" => $verse, ":content" => $content);
insertSqlStatement($db, $sqlString, $parameters);

$scripId = $db->lastInsertId('scriptures_id_seq');

foreach ($topicIds as $topicId) {
    $sqlString = "INSERT INTO scripture_topics (scriptureId, topicsId) VALUES( :scripId, :topicId)";
    $parameters = array(":scripId" => $scripId, ":topicId" => $topicId);
    insertSqlStatement($db, $sqlString, $parameters);
}


foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
    $queryArray = Array (book => $row['book'], chapter => $row['chapter'], verse => $row['verse']);
    echo "<a href='team05scripture.php?";
    echo http_build_query($queryArray);
    echo "'><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong>';// - "';
//    echo $row['content'];
    echo '</a>topics:';
    $sqlString = "SElECT t.name FROM Scriptures as s JOIN scripture_topics as st on s.id = st.scriptureId JOIN topics 
    as t on st.topicsId = t.id WHERE s.id = :scripId;";
    $parameters = array(":scripId" => $row['id']);
    $topics = getSqlResults($db, $sqlString, $parameters);
    foreach ($topics as $row) {
        echo $row['name'] . ", ";
    }
    echo '<br/>';
}

?>
</body>
