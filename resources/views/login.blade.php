@extends('master')
@extends('header')
@section('content')
<h1>Login</h1>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">        
            <form action="" method="POST" >
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="from-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('footer')

<style>
    .custom-login{
        height: 500px;
        padding: 100px;
    }
    .btn{
        margin: 10px;   
    }
</style>