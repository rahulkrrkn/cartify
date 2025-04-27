<li class="NavElement">
    <a href="/cartify/user/products/">
        <i class="fa-solid fa-store fa-lg"></i> <span>Products</span>
    </a>
</li>
<li class="NavElement">
    <a href="/cartify/user/cart/">
        <i class="fa-solid fa-cart-shopping fa-lg"></i> <span>Cart</span>
    </a>
</li>
<li class="NavElement">
    <a href="/cartify/user/wishlist/">
        <i class="fa-solid fa-heart fa-lg"></i> <span>Wishlist</span>
    </a>
</li>

<?php
if (isset($_SESSION['CFpublic']['product']['viewProduct'])) {
?>
    <li class="NavElement">
        <a href="/cartify/user/product/">
            <i class="fa-solid fa-clock-rotate-left fa-lg"></i> <span>Last Viewed</span>
        </a>
    </li>
<?php
}
?>
<li class="NavElement">
    <a href="/cartify/user/address/">
        <i class="fa-solid fa-map-marker-alt fa-lg"></i> <span>My Address</span>
    </a>
</li>
<li class="NavElement">
    <a href="/cartify/user/my-orders/">
        <i class="fa-solid fa-box fa-lg"></i> <span>My Orders</span>
    </a>
</li>