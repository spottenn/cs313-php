<?php
require 'connect-db.php';
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

function getTopics ($db) {
    $sqlString = "SELECT * FROM topics";
    $parameters = array();
    return getSqlResults($db, $sqlString, $parameters);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team 06</title>
</head>
<body>
<h1>Insert Scripture</h1>
<form action="team06.php" method="post">
    <label for="book">Book: </label><input type="text" name="book">
    <label for="chapter">Chapter: </label><input type="text" name="chapter">
    <label for="verse">Verse: </label><input type="text" name="verse">
    <label for="content">Content: </label><textarea name="content">
        <?php
        $topics = getTopics($db);
        foreach ($topics as $id => $topic) {
            echo "<input type=\"checkbox\" id=\"" . $topic . "\" name=\"" . $topic . "\" value=\"" . $id ."\">
<label for=\"" . $topic . "\">" . $topic . "</label><br>";
        }
        ?>
</form>
<?php
$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);
$content = htmlspecialchars($_POST['content']);
?>