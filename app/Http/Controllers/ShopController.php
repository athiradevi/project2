<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    public function index()
    {
        return view('shop');
    }  
      
    
}