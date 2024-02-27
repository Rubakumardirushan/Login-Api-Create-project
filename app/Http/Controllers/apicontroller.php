<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class apicontroller extends Controller
{
public function register(Request $request){
    $password= $request->input('password');
    //$password['password']=bcrypt($password['password']);
    $name= $request->input('name');
    $email= $request->input('email');
    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ]);
$reponse['token']=$user->createToken('myapp')->accessToken;
return response()->json($reponse,200);
if($user){
    return response()->json(['message'=>'User created successfully'],200);
}
else{
    return response()->json(['message'=>'User not created'],400);
}
}

public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
public function getuserinfo(){
    $user = Auth::user();

        $data = [
            'name'=>$user->name,
            'email'=>$user->email,
        ];
        $response['user'] = $data;
        return response()->json($response,200);
    }
}












