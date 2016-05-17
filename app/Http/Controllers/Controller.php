<?php

namespace Laracom\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Cart;
use Laracom\Models\Cliente;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //Carrinho de compras em todas as visões//
    public function __construct(Request $request){
        $cart = Cart::content();
        $carts_row = Cart::total();
        $carts = Cart::count(); 
        $id = $request->session()->get('dados');
        $cliente = Cliente::find($id);
        $contatos = DB::table('contatos')->paginate(5); 
        view()->share(compact('cart','carts_row','carts','contatos','cliente'));
    }
    
}
