<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign 08</title>
    <link rel="stylesheet" type="text/css" href="assign04.css">
    <link rel="stylesheet" type="text/css" href="assign08.css">
</head>
<body>
<?php
include "header-and-sidebar.php"

?>
<article>
    <h1>Checkout</h1>
    <form action="confirmation.php" method="post">
        <h2>Address</h2>
        <label for="name">Name: </label>
        <textarea id="name" name="name" class="required" rows="1" cols="50"></textarea>
        <p class="feedback">*enter a value</p><br>
        <label for="address-line-1">Address line 1: </label>
        <textarea id="address-line-1" name="address-line-1" class="required" rows="1" cols="50"></textarea>
        <p class="feedback">*enter a value</p><br>
        <label for="address-line-2">Address line 2: </label>
        <textarea id="address-line-2" name="address-line-2" class="required" rows="1" cols="50"></textarea>
        <p class="feedback">*enter a value</p><br>
        <label for="city">City: </label>
        <input type="text" id="city" name="city">
        <label for="state">State: </label>
        <select name="state">
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
            <option value="AS">AS</option>
            <option value="GU">GU</option>
            <option value="MP">MP</option>
            <option value="PR">PR</option>
            <option value="UM">UM</option>
            <option value="VI">VI</option>
            <option value="AA">AA</option>
            <option value="AP">AP</option>
            <option value="AE">AE</option>
        </select>
        <label for="zip">Zip code: </label>
        <input type="text" id="zip" name="zip"><br>
        <label for="phone">Phone, ex. 111-222-3333: </label>
        <input type="text" id="phone" name="phone" class="required"">
        <p class="feedback">*enter a value in the specified format</p><br>

        <input name="validate" type="submit" value="Submit">
        <input name="reset" type="reset"><br>
    </form>
    <br><br>
    <a href="cart.php">Return to cart</a>

</article>
</body>
</html>