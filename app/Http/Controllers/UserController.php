<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function InsertUser(Request $request){
        // $validateDate = $request->validate([
        //     "name" => "required|string",
        //     "email" => "required|email|unique:users",
        //     "password" => "required|string"
        // ]);

        $findUser = User::where('email',$request->get('email'))->first();

        if($findUser){
            return response(['message'=>"User already exist!"]);
        }

        DB::statement("alter table users auto_increment = 1");

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $otp = mt_rand(100000, 999999);
        $user->otp = $otp;

        $user->save();

        Mail::to($user->email)->send(new OtpMail('http://localhost/verify_otp?user_id='.$user->id.'&code='.$otp));

        return response()->json(["message"=>"success"]);
    }

    public function verifyOtp(Request $request){
        if(!$user = User::find($request->query('user_id'))){
            return response(["message"=>"User is not found"]); 
        };
        $code = $request->query('code');

        if($user && $code == $user->otp){
            $user->email_verified_at = Carbon::now();
            $user->save();
            return response(["message"=>"Verify successcully"]);
        }

        return response(["message"=>"OTP is invalid"]);
    }

    public function LoginUser(Request $request){
        $validateData = $request->validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);

        if(!$user = User::where('email',$validateData["email"])->first()){
            return response()->json(["message"=>"User with that is email is not found"]);
        };

        if(Hash::check($validateData["password"],$user->password)){
            $token = $user->createToken("API_Token")->accessToken;
            return response()->json(["message"=>"success","token"=>$token]);
        }else{
            return response()->json(["message"=>"Incorrect Password"]);
        }
    }

    public function getUserData(Request $request){
        $user = Auth::user();

        if($user){
            return response()->json([
                'name'=> $user->name,
                'email'=> $user->email,
            ]);
        }
    }
    
    public function findUserProduct(Request $request){
        return response()->json(["product"=>User::with('cartProducts')->find($request->id)]);
    }
}
