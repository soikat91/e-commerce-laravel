@extends('master')
@extends('header')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $products['image'] }}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h1>{{ $products['name'] }}</h1>
            <h2>Price:{{$products['price']  }}</h2>
            <h3>Description:{{ $products['description'] }}</h3>
            <h3>Category:{{ $products['category'] }}</h3>
            <br><br>
             <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products['id'] }}">
                <button class="btn btn-primary">Add To Card</button>
             </form>
            
            <br>
            <br>
            <button class="btn btn-success">Buy</button>
        </div>
    </div>
</div>

@endsection
@extends('footer')
