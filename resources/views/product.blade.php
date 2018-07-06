@extends('layout')

@section('title', $product->name)

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="{{ route('shop.index') }}">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{ $product->name }}</span>
    @endcomponent

    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="{{asset('img/products/'.$product->slug.'.png')}}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="{{asset('img/products/'.$product->slug.'.png')}}" alt="product">
                </div>

                @if ($product->images)
                    @foreach (json_decode($product->images, true) as $image)
                        <div class="product-section-thumbnail">
                            <img src="" alt="product">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->details }}</div>
            <div class="product-section-price">{{ $product->presentPrice() }}</div>
            <p>
                {!! $product->description !!}
            </p>
            <p>&nbsp;</p>

            @if($isInCart)
                <a href="{{route('cart.index')}}">
                    <div class="button-primary">
                        <i class="fas fa-check"></i> Allready in Cart
                    </div>
                </a>
            @else
                <form action="{{route('cart.store')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="button button-plain"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </form>
            @endif

            <div class="spacer"></div>

            @if($isInSaveForLater)
                <a href="{{url('cart#saved-for-later-title')}}" >
                    <div class="button button-save-for-later button-save-for-later-active">
                        <i class="fas fa-heart"></i> Allready Saved For Later
                    </div>
                </a>
            @else
                <form action="{{route('saveForLater.store')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="button button-save-for-later"><i class="far fa-heart"></i> Save For Later</button>
                </form>
            @endif

        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')

@endsection
