@extends('master')
@extends('header')
@section('content')

<div class="custom-product">
    <div class="col-sm-10">
      <div class="trending-wrapper">
            <h4>My Order List</h4> 
            @if($myorder->count()>1)          
                @foreach ($myorder as $products)
            
                    <div class="row custom-cart">
                        <div class="col-sm-3">
                            <a href="/details/{{ $products->id }}">
                                <img  class="detail-img" src="{{ $products->image }}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-5">
                            <h2>Price:{{$products->price }}</h2>
                            <h3>Payment Method:{{ $products->payment_method}}</h3>
                            <h3>Payment Status:{{ $products->payment_status}}</h3>
                            <h3>Addres:{{ $products->address }}</h3>
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                        
                    </div>      
            
                
                @endforeach
            @else
                <h2>No Order</h2>
                
            @endif
           


            
      </div>
    </div>
</div>

@endsection
@extends('footer')
