<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector - Projection</title>
    <link rel="stylesheet" type="text/css" href="../03-prove/assign04.css">
    <link rel="stylesheet" type="text/css" href="../03-prove/assign08.css">
    <link rel="stylesheet" type="text/css" href="assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
</head>
<body>
<div id="primary-div">
    <h1>Financial Projector</h1>
    <h2>Projection: Coming Soon</h2>
<!--    <form action="financial-projector-projections.php" method="post"> <!--onsubmit="return validateAll()"-->-->
<!--        Username<br>-->
<!--        <input id="username" class="input-field" type="text" name="username"><!--oninput="validateName()"-->-->
<!--        <!--        <p id="name-feedback" class="feedback"></p><br>-->-->
<!--        <!--        <p></p>-->-->
<!--        <input id="sign-in" type="submit" value="Sign In">-->
<!--    </form>-->
<!--    <p class="notice">*Please note, your projections are not password protected. Please do not enter any personal information.-->
<!--        Projections are deleted on the second night after your projection was last edited</p>-->
</div>
<?php
require_once 'connect-db.php';
require_once 'generate-projection.php';
require_once 'helper-functions.php';
printNiceProjectionTable(generateProjection($db, $_SESSION['projectionId']));
?>
</body>
</html>