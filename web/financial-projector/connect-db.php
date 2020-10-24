<?php
try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}
function createProjection($db, $username, $projName) {
    $userIdArray = getSqlResults($db, "(SELECT id FROM users WHERE username = :username)", array(':username' => $username));
    $sql = "INSERT INTO projections (user_id, name, created) 
        VALUES (:user_id, :proj_name, current_timestamp);";
    if (isset($userIdArray[0])) {
        insertSqlStatement($db, $sql, array(':user_id' => $userIdArray[0]['id'], ':proj_name' => $projName));
    }
    return $db->lastInsertId('projections_id_seq');

}
//foreach ($db->query('SELECT username, password FROM note_user') as $row)
//{
//    echo 'user: ' . $row['username'];
//    echo ' password: ' . $row['password'];
//    echo '<br/>';
//}