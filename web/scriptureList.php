<?php
if (!isset($db)) {
    require 'connect-db.php';
    require 'team06functions.php';
}
foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
    $queryArray = Array ('book' => $row['book'], 'chapter' => $row['chapter'], 'verse' => $row['verse']);
    echo "<a href='team05scripture.php?";
    echo http_build_query($queryArray);
    echo "'><strong>";
    echo $row['book'] . " " . $row['chapter'] .":" . $row['verse'];
    echo '</strong>';// - "';
//    echo $row['content'];
    echo '</a> topics: ';
    $sqlString = "SElECT t.name FROM Scriptures as s JOIN scripture_topics as st on s.id = st.scriptureId JOIN topics 
    as t on st.topicsId = t.id WHERE s.id = :scripId;";
    $parameters = array(":scripId" => $row['id']);
    $topics = getSqlResults($db, $sqlString, $parameters);
    foreach ($topics as $topicrow) {
        echo $topicrow['name'] . ", ";
    }
    echo ' - "';
    echo $row['content'];
    echo '"<br/>';
}