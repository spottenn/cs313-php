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
$dbTopics = getTopics($db);
$topicIds = Array();
foreach ($dbTopics as $id => $dbTopic) {
    if (isset($_POST[$dbTopic])) {
        $id = htmlspecialchars($_POST[$dbTopic]);
        $topicIds[] = $id;
    }
}
print_r($topicIds);
var_dump($topicIds);
echo "<br><br>dbTopics";
var_dump($dbTopics);

echo "<br><br>";
var_dump($_POST);

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
    echo 'topics: "</a><br/>';
}

?>
</body>
