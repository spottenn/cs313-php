<?php
session_start();
?>
<?php
include "connect-db.php";
$projection = htmlspecialchars($_POST['projection-name']);

$statement = $db->query(
    "SELECT * FROM expenses WHERE id = (SELECT id FROM projections WHERE name = 'Jane''s projection')");
$results = $statement->fetchAll(PDO:: FETCH_ASSOC);