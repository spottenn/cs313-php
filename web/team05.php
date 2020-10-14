<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
</head>
<body>
<h1>Scripture Resources</h1>
<?php
include "connect-db.php";

foreach ($db->query('SELECT * FROM scriptures') as $row)
{
    $queryArray = Array (book => $row['book'], chapter => $row['chapter'], verse => $row['verse']);
    echo "<a href='team05scripture.php?";
    echo http_build_query($queryArray);
    echo "'><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong>';// - "';
//    echo $row['content'];
    echo '"</a>';
}

?>
</body>
