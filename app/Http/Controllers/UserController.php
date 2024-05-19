<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use PhpParser\JsonDecoder;
use App\Models\Product_key;
use App\Models\User_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function RegisterForm(){
        return view("Auth.register");
    }

    public function register(Request $request){
        $data = $request->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:Users,email",
            "password"=>"required"
        ]);
        $data['password']= bcrypt($data['password']);
        User::create($data);
        return redirect(url("login"));
    }

    public function LoginForm(){
        return view("Auth.login");
    }

    public function login(Request $request){
        $data = $request->validate([
            "email"=>"required",
            "password"=>"required|string"
        ]);
        Auth::attempt(["email"=>$data['email'] , "password"=>$data['password']]);
        if(Auth::check() && Auth::User()->role == "admin"){
            return redirect(url("admin"));
        }elseif(Auth::check() && Auth::User()->role == "user"){
            return redirect(url("user"));
        }else{
            return redirect(url("login"));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url("login"));
    }

    public function userPanel(){
        $product_key = Product_key::all();
        return view("User.userPanel")->with("product_key",$product_key);
    }

    public function userAddProduct(Request $request){
        $request->validate([
            "option"=>"required"
        ]);
        $option = $request['option'];
        $data= json_decode($option);
        $id = Auth::User()->id;
        $timestamp = $data->created_at;
        $carbonTimestamp = Carbon::parse($timestamp);
        $created_date = $carbonTimestamp->format('Y-m-d');

        User_product::create([
            "user_id" => $id,
            "product_key"=>$data->product_key,
            "created_date"=>$created_date,
            "expire_date"=>$data->expire_date
        ]);
        return redirect(url("user"));
    }

    public function user_product(){
        $user_id = Auth::User()->id;
        $user_product_key = User_product::where(['user_id' => $user_id])->get();
        return view("User.userProduct")->with('user_product_key',$user_product_key);
    }


}
