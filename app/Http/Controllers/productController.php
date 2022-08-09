<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index(){

        //return Product::all();
        $data=Product::all();
        return view('product',['products'=>$data]);
    }
    public function details($id){

         $data= Product::find($id);
         return view('details',['products'=>$data]);
    }

    public function addToCart(Request $request){
        
        if($request->session()->has('user')){

            $cart= new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/');
        }else{
            return redirect('login');
        }
       
    }

    static function cartItem(){

        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    
    public function cartList(){

        $userId=Session::get('user')['id'];
         $cartProducts=DB::table('cart')
            ->join('product','cart.product_id','=','product.id')
            ->where('cart.user_id',$userId)
            ->select('product.*','cart.id as cart_id')
            ->get();
           // return $cartProducts;
            return view('cartlist',['product'=>$cartProducts]);
    }

    public function cartRemove($id){

        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow(){
        
       $userId=Session::get('user')['id'];
       $total= DB::table('cart')
        ->join('product','cart.product_id','=','product.id')
        ->where('cart.user_id',$userId)
        ->select('product.*','card.id as cart_id')
        ->sum('product.price');
        //return $total;

        return view('order',['total'=>$total]);

    }
    public function order(Request $request){
        
        $userId=Session::get('user')['id'];
        $allProduct= Cart::where('user_id',$userId)->get();
        foreach( $allProduct as $cartProducts){
           $order=new Order ;

           $order->user_id=$cartProducts['user_id'];
           $order->product_id=$cartProducts['product_id'];
           $order->status="pending";
           $order->payment_method=$request->payment;
           $order->payment_status="pending";
           $order->address=$request->address;
           $order->save();
           Cart::where('user_id',$userId)->delete();
        }
       // return $request->input();
        return redirect('/');

    }
    public function myOrder(){
        
        $userId=Session::get('user')['id'];

         $myorder=DB::table('order')
        ->join('product','order.product_id','=','product.id')
        ->where('order.user_id',$userId)        
        ->get();
        // if($myorder->count()>1){
        //     return 'yes';
        // }else{
        //     return 'flase';
        // }
       return view('myorder',['myorder'=>$myorder]);
    }
}
