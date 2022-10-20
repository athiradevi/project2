<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::where('id',$id)->get()->first();
        $cart = Cart::where('user_id',$id)->get();
        $grand_total = Cart::sum('grand_total');
        return view("checkout", ['user'=>$user,'cart'=>$cart,'grand_total'=>$grand_total]);
    }  
    public function updateuserdata(Request $request)
    {

        $id = auth()->user()->id;

        User::where(array('id'=>$id))
            ->update(array('name'=>$request->name,
                           'email'=>$request->email,
                           'phoneno'=>$request->phone,
                           'address'=>$request->address,
                           'state'=>$request->state,
                           'country'=>$request->country,
                           'zip_code'=>$request->zip
                        ));

        return response()->json(
            [
                'success' => true,
                'message' => 'Data update successfully'
            ]
        );
    } 
    public function placeorder(Request $request)
    {

        $id = auth()->user()->id;
        $cart = Cart::where('user_id',$id)->get();
        foreach($cart as $cart_val)
        {
            $data = array('p_name'=>$cart_val->p_name,
                           'p_id'=>$cart_val->c_id,
                           'u_id'=>$id,
                           'p_rate'=>$cart_val->p_rate,
                           'qty'=>$cart_val->qty,
                           'grand_total'=>$cart_val->grand_total,
                           'status'=>1,
                    );
            DB::table('order_details')->insert($data);
        }
        DB::table('cart')->where('user_id',$id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Order Placed successfully'
            ]
        );
    } 
    public function thanks()
    {
        return view("thankyou");
    }  
    public function orderstatus()
    {
        $id = auth()->user()->id;
        $order_details = DB::table('order_details')->where(array('u_id'=>$id))->get();
        //$status = $order_details->status;
        return view("orderstatus", ['status'=>$order_details]);
    } 
    
    
}