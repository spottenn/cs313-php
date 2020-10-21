<?php
require 'connect-db.php';
require 'team06functions.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team 06</title>
</head>
<body>
<h1>Insert Scripture</h1>
<form action="team06insert.php" method="post">
    <label for="book">Book: </label><input type="text" name="book"><br>
    <label for="chapter">Chapter: </label><input type="text" name="chapter"><br>
    <label for="verse">Verse: </label><input type="text" name="verse"><br>
    <label for="content">Content: </label><textarea name="content"></textarea><br>
        <?php
        $topics = getTopics($db);
        foreach ($topics as $row) {
            $topic = $row['name'];
            $id = $row['id'];
            echo "<input type=\"checkbox\" id=\"" . $topic . "\" name=\"" . $topic . "\" value=\"" . $id ."\">
<label for=\"" . $topic . "\">" . $topic . "</label><br>";
        }
        ?>
    <input type="submit" value="Submit">
</form>
<?php
?>