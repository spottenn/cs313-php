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
    <h2>Projection: <?php echo $_SESSION['projectionName']; ?></h2>
    <p><a class='button' href='generate-csv.php'>Download</a></p>

</div>
<?php
require_once 'connect-db.php';
require_once 'generate-projection.php';
require_once 'helper-functions.php';

$projectionLines = generateProjection($db, $_SESSION['projectionId']);
printNiceProjectionTable($projectionLines);
?>
</body>
</html>