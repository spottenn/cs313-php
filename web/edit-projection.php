<?php
session_start();
?>
<?php
include "connect-db.php";
$projection = htmlspecialchars($_POST['projection-name']);
$projection = pg_escape_literal($projection);
$statement = $db->prepare(
    "SELECT * FROM proj_entries WHERE projection_id = (SELECT id FROM projections WHERE name = $projection)
    ORDER BY entry_type DESC");
$statement->execute(array(':projection' => $projection));
$entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

print_r($entries);