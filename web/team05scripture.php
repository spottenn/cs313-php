<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
</head>
<body>
<h1>Scripture </h1>
<?php
include "connect-db.php";
$book = htmlspecialchars($_GET["book"]);
$chapter = htmlspecialchars($_GET["chapter"]);
$verse = htmlspecialchars($_GET["verse"]);

$queryString = "SELECT * FROM scriptures WHERE book = '";
$queryString .= $book;
$queryString .= "' AND chapter = ";
$queryString .= $chapter;
$queryString .= " AND verse = ";
$queryString .= verse . "";

echo $queryString;


foreach ($db->query($queryString) as $row)
{
    echo "<p><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong> - "';
    echo $row['content'];
    echo '"</p>';
}