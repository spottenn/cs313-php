

<header>
    <a id="store-logo" href="browse.php">
        <img id="store-logo-img" src="only-lamps-store-logo.jpg" alt="lamp store logo"/></a>
    <div id="header-columns">
        <div id="header-col-1">
            <h3 id="slogan">The store for lamps</h3>
            <a href="browse.php" id="cart-icon"><img class="icon" src="cart-icon.png" alt="cart icon"/></a>
            <a href="browse.php"><img class="icon" src="search-icon.png" alt="search icon"/></a>
        </div>
        <nav id="header-col-2">
            <ul>
                <li><a href="browse.php">Browse Items</a></li>
                <li><a href="cart.php">Cart(<?php echo count($_SESSION)?>)</a></li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </nav>
    </div>
</header>
<aside></aside>