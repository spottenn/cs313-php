<?php
session_start();
//session_unset();
include "items.php";
foreach ($items as $item => $price) {
    if(isset($_POST[$item])) {
        $qty = htmlspecialchars($_POST["qty-" . $item]);
        $_SESSION[$item] = ["price" => $price,"qty" => $qty];
    }
}
//foreach ($_POST as $key => $value) {
//    $_SESSION[htmlspecialchars($key)] = htmlspecialchars($value);
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>browse</title>
    <link rel="stylesheet" type="text/css" href="assign04.css">
    <link rel="stylesheet" type="text/css" href="assign08.css">
</head>
<body>

<?php
include "header-and-sidebar.php"
?>

<article>
<!--    --><?php
//    print_r($_SESSION);
//
//    ?>
    <h1>Items</h1>
    <form action="browse.php" method="post">
        <table id="form-table">
            <?php
            foreach ($items as $item => $price) {
                echo "<tr><td>" . $item . "</td><td>$" . $price .
                    "</td><td><button type=\"submit\" class=\"add-to-cart\" name=\"" .
                    $item . "\" value=\"" . $price . "\">add to cart</button></td><td><label for=\"qty-" . $item .
                    "\">Qty.</label><select name=\"qty-" . $item . "\">";

                //Qty drop-down
                for ($i = 1; $i <= 100; $i++) {
                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                }
                echo "</select></td></tr>";
            }
            ?>
        </table>
    </form>
</article>
</body>
</html>

