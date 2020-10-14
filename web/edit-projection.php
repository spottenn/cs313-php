<?php
session_start();
?>
<?php
try {

    include "connect-db.php";
    $projection = htmlspecialchars($_POST['projection-name']);
//    $projection = pg_escape_literal($projection);
    $statement = $db->prepare(
        "SELECT * FROM proj_entries WHERE projection_id = (SELECT id FROM projections WHERE name = :projection)
    ORDER BY entry_type DESC");
    echo 'prepared<br/>';
    $statement->bindValue(':projection', $projection);
    $statement->execute();
    $entries = $statement->fetchAll(PDO:: FETCH_ASSOC);

}
catch (Exception $e) {
    echo $e->getMessage() . '<br/>' . $e->getTraceAsString();
}
print_r($entries);