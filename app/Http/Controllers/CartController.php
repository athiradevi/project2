<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $cart = Cart::where('user_id',$id)->get();
        $grand_total = Cart::sum('grand_total');
        return view("cart", ['cart'=>$cart,'grand_total'=>$grand_total]);
    }  
      
    public function ajaxRequestPost(Request $request)
    {

        Cart::create($request->all());

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
    public function qty_plus(Request $request)
    {

        $id = auth()->user()->id;
        $qty = $request->qty+1;
        Cart::where(array("c_id"=> $request->id,'user_id'=>$id))->update(array('qty'=>$qty,'grand_total'=>$request->grand_total));

        return response()->json(
            [
                'success' => true,
                'message' => 'Data update successfully'
            ]
        );
    }

    public function qty_minus(Request $request)
    {

        $id = auth()->user()->id;
        $qty = $request->qty-1;
        Cart::where(array("c_id"=> $request->id,'user_id'=>$id))->update(array('qty'=>$qty,'grand_total'=>$request->grand_total));
        Cart::where(array("c_id"=> $request->id,'user_id'=>$id,'qty'=>0))->get();
        if(!empty($cart))
        {

            
            return response()->json(
            [
                'success' => true,
                'message' => 'Data update successfully'
            ]
        );
        }
        else
        {
            Cart::where(array("c_id"=> $request->id,'user_id'=>$id,'qty'=>0))->delete();
            return response()->json(
            [
                'success' => true,
                'message' => 'Data update successfully'
            ]
        );
        }

        
    }
    
}