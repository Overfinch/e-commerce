<header>
    <div class="top-nav container">
        <div class="top-nav-left">
            <div class="logo"><a href="/">Ecommerce</a></div>
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))

            @endif
        </div>
        <div class="top-nav-right">
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))

            @endif
        </div>
    </div> <!-- end top-nav -->
</header>