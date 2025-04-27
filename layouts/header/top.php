<nav data-name="Header" class="MainNav">
    <section id="NavLogoSection">
        <i class="fa-solid fa-bars fa-2xl NavMenuBtn fa-lg NavMenuDesktop"></i>
        <a href="/cartify/">
            <img loading="lazy"
                id="NavLogoImg"
                src="/cartify/assets/images/logo.webp"
                alt="Logo" />
        </a>
    </section>
    <?php
    if (isset($_SESSION["CFglobal"]["userIs"]) && $_SESSION["CFglobal"]["userIs"] == "public" || $_SESSION["CFglobal"]["userIs"] == "user") {
    ?>
        <section id="searchSystem" class="navCenter">
            <div class="search-bar-container" id="searchBar">
                <input type="text" id="navSearchInput" placeholder="Search for products, brands and more..." onfocus="showSuggestions()" onblur="hideSuggestions()">
                <div class="search-icons">
                    <i class="fa fa-search search-icon" onclick="searcProducts()"></i>
                    <i class="fa fa-times close-icon" id="closeSearch"></i>
                </div>
                <div class="suggestions" id="suggestionsBox">
                    <div id="searchMessage"></div>
                    <div class="category" id="navCategoryResult">

                    </div>
                    <div class="product" id="navProductResult">
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <section id="NavBtnSection">
        <?php
        if (isset($_SESSION["CFglobal"]["userIs"]) && $_SESSION["CFglobal"]["userIs"] == "public" || $_SESSION["CFglobal"]["userIs"] == "user") {
        ?>
            <i class="fa fa-search" id="searchIcon"></i>
            <i
                id="NavModeBtn"
                class="fa-solid fa-toggle-on fa-flip-horizontal fa-2xl NavMode" style="display: none;"></i>
            <a href="/cartify/user/wishlist/"><i id="NavBellIcon" class="fa-solid fa-heart fa-lg">
                    <div id="WishlistCount"><?= isset($_SESSION["CFuser"]["wishList"]) ? count($_SESSION["CFuser"]["wishList"]) : "0" ?>
                    </div>
                </i></a>

            <a href="/cartify/user/cart/"><i id="NavBellIcon" class="fa-solid fa-cart-shopping fa-lg">
                    <div id="CartCount"><?= isset($_SESSION["CFuser"]["cart"]) ? count($_SESSION["CFuser"]["cart"])   : "0" ?></div>
                </i></a>
        <?php
        }
        ?>

        <i class="fa-solid fa-bars fa-2xl NavMenuBtn fa-lg NavMenuPhone"></i>
    </section>

    <section id="NavElementSection">
        <ul>