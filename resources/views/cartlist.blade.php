@extends('master')
@extends('header')
@section('content')

<div class="custom-product">
    <div class="col-sm-10">
      <div class="trending-wrapper">
            <h4>Results for products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
            @foreach ($product as $products)
                <div class="row custom-cart">
                    <div class="col-sm-3">
                        <a href="/details/{{ $products->id }}">
                            <img  class="detail-img" src="{{ $products->image }}" alt="">
                        </a>
                    </div>
                    <div class="col-sm-5">
                        <h2>{{$products->price }}</h2>
                        <h3>{{ $products->description }}</h3>
                        <h3>{{ $products->category}}</h3>
                    </div>
                    <div class="col-sm-3">
                        <a href="/remove/{{ $products->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                    </div>
                    
                </div>
                
            @endforeach
      </div>
    </div>
</div>

@endsection
@extends('footer')
