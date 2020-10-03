<?php
session_start();
include "items.php";
foreach ($items as $item => $price) {

    if (isset($_POST["qty-" . $item])) {
        $newqty = htmlspecialchars($_POST["qty-" . $item]);
//            echo "<br>newqty: " .$newqty;
        $_SESSION[$item]["qty"] = $newqty;
        if($newqty == 0) {
            unset($_SESSION[$item]);
        }
    }
}
foreach ($_POST as $item => $details) {
    unset($_SESSION[$item]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="assign04.css">
    <link rel="stylesheet" type="text/css" href="assign08.css">
</head>
<body>
<?php
include "header-and-sidebar.php"
?>

<article>
    <!--    --><?php
    //    echo "<br>post";
    //    print_r($_POST);
    //
    //    echo "<br>Session";
    //    print_r($_SESSION);
    //
    //
    //
    //    ?>
    <h1>Cart</h1>
    <form action="cart.php" method="post">
        <table id="form-table">
            <?php
            //            print_r($_SESSION);

            $total = 0;
            foreach ($_SESSION as $item => $details) {
                $price = $details["price"];
                $qty = $details["qty"];
                echo "<tr><td>" . $item . "</td><td>$" . $price . "</td>";
                $total += $price * $qty;
                echo "<td><label for=\"qty-" . $item .
                    "\">Qty.</label><select onchange=\"this.form.submit()\" name=\"qty-" . $item . "\">";

                //Qty drop-down
                for ($i = 0; $i <= 100; $i++) {
                    echo "<option ";
                    if ($i == $details["qty"]) {
                        echo "selected";
                    }
                    echo " value=\"" . $i . "\">" . $i . "</option>";
                }
                echo "</select></td>";
                echo "<td><button type='submit' class='add-to-cart' name='$item' value='remove'>remove</button></td>";

            }
            ?>

        </table>
    </form>
    <p>Total: $<?php echo $total; ?></p>
    <br>
    <button><a class="button" href="checkout.php">Checkout</a></button>
</article>
</body>
</html>