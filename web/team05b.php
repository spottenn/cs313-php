<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
</head>
<body>
<h1>Scripture in
    <?php
    $book = htmlspecialchars($_GET["book"]);
    echo $book;
    ?>
</h1>
<form action="team05b.php">
    <input type="text" name="book">
    <input type="submit">
</form>
<?php
include "connect-db.php";

foreach ($db->query("SELECT * FROM scriptures WHERE book = '" . $book . "'") as $row)
{
    echo "<p><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong> - "';
    echo $row['content'];
    echo '"</p>';
}