<header>
    <div class="top-nav container">
        <div class="top-nav-left">
            <div class="logo"><a href="/">Ecommerce</a></div>
        </div>
        <div class="top-nav-right">
            <ul>
                <li><a href="{{route('shop.index')}}">Shop</a></li>
                <li><a href="">Abuot</a></li>
                <li><a href="{{route('landing-page')}}">Blog</a></li>
                <li>
                    <a href="{{route('cart.index')}}">Cart
                        @if(Cart::instance('default')->count() > 0)
                            <span class="cart-count"><span>{{Cart::count()}}</span></span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div> <!-- end top-nav -->
</header>