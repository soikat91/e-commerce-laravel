@extends('master')
@extends('header')
@section('content')

<div class="custom-order">
    <div class="col-sm-10">
        <table class="table">
            
            <tbody>
              <tr>
                <td>Amount</td>
                <td>{{ $total }}</td>                
              </tr>
              <tr>
                <td>Tax</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Delivery</td>
                <td>10</td>                
              </tr>
              <tr>
                <td>Total Amount</td>
                <td>{{$total+10 }}</td>                
              </tr>
            </tbody>
          </table>

          <div>
            <form action="/order" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Enter your address "></textarea>   
                </div>
                 <div class="form-group">
                    <label for="pwd">Payment Method:</label><br><br>
                    <input type="radio" name="payment" value="cash"> <span>Online Payment</span><br><br>
                    <input type="radio" name="payment" value="cash"> <span>Cash Payment</span>
                </div>            
                
                <button type="submit" class="btn btn-primary">Order Now</button>
              </form>
          </div>
    </div>
</div>

@endsection
@extends('footer')
