@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
    @endcomponent




    <div class="cart-section container">
        <div>
            <div class="alert alert-success">
                Item was added to your cart!
            </div>



            <h2>1 item(s) in Shopping Cart</h2>

            <div class="cart-table">
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="http://laravel-ecommerce-example.loc/shop/laptop-1"><img src="http://laravel-ecommerce-example.loc/storage/products/dummy/laptop-1.jpg" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="http://laravel-ecommerce-example.loc/shop/laptop-1">Laptop 1</a></div>
                            <div class="cart-table-description">14 inch, 3 TB SSD, 32GB RAM</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="http://laravel-ecommerce-example.loc/cart/027c91341fd5cf4d2579b49c4b6a90da" method="POST">
                                <input type="hidden" name="_token" value="CfVdd1oeRUfoQxn2StfcyilGXmY2oZwCuta7A4zP">
                                <input type="hidden" name="_method" value="DELETE">

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action="http://laravel-ecommerce-example.loc/cart/switchToSaveForLater/027c91341fd5cf4d2579b49c4b6a90da" method="POST">
                                <input type="hidden" name="_token" value="CfVdd1oeRUfoQxn2StfcyilGXmY2oZwCuta7A4zP">

                                <button type="submit" class="cart-options">Save for Later</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity" data-id="027c91341fd5cf4d2579b49c4b6a90da">
                                <option selected="">1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div>$2,463.96</div>
                    </div>
                </div> <!-- end cart-table-row -->

            </div> <!-- end cart-table -->


            <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="http://laravel-ecommerce-example.loc/coupon" method="POST">
                    <input type="hidden" name="_token" value="CfVdd1oeRUfoQxn2StfcyilGXmY2oZwCuta7A4zP">
                    <input type="text" name="coupon_code" id="coupon_code">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container -->

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax (13%)<br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        $2,463.96 <br>
                        $320.31 <br>
                        <span class="cart-totals-total">$2,784.27</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="http://laravel-ecommerce-example.loc/shop" class="button">Continue Shopping</a>
                <a href="http://laravel-ecommerce-example.loc/checkout" class="button-primary">Proceed to Checkout</a>
            </div>



            <h3>You have no items Saved for Later.</h3>


        </div>

    </div>

    @include('partials.might-like')

@endsection
