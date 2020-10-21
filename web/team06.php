<?php
require 'connect-db.php';
require 'team06functions.php';
insertSrcipture($db);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team 06</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h1>Insert Scripture</h1>
<form id="insert-form" action="team06InsertScrip.php" method="post">
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
    <input type="checkbox" name="new-topic" value="new-topic">
    <input type="text" name="new-topic-name">
    <input type="submit" value="Submit">
</form>
<h1>Scripture List</h1>
<div id="scrip-list"><?php include "scriptureList.php"; ?></div>
<script>
    // $("#insert-form").ajaxForm(function () {
    //     $('#scrip-list').load('scriptureList');
    //     console.log(got)
    //     return false;
    // });
    $('#myFormId').submit(function() {
        $(this).ajaxSubmit(function () {
            $('#scrip-list').load('scriptureList');
            console.log(gothere)
            return false;
        });
        return false;
    });
</script>
</body>
