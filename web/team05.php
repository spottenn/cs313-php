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
    echo "<p><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong> - "';
    echo $row['content'];
    echo '"</p><br/>';
}

?>
</body>
