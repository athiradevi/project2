<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class DeliveryboyController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $is_deliveryboy = auth()->user()->is_deliveryboy;
        /*$user = User::where(array'id',$id)->get()->first();
        $cart = Cart::where('user_id',$id)->get();
        $grand_total = Cart::sum('grand_total');*/
        $order_details = DB::table('order_details')->where('status' , '>=', 1)->get();
        return view("order_details", ['order_details'=>$order_details]);
    } 
    public function updatestatus(Request $request)
    {
        $id = auth()->user()->id;
        $is_deliveryboy = auth()->user()->is_deliveryboy;
        DB::table('order_details')->where(array('id'=>$request->id))
            ->update(array('status'=>$request->status
                        ));
        return response()->json(
            [
                'success' => true,
                'message' => 'Data update successfully'
            ]
        );
    }  
   
    
}