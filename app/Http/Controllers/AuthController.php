<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }
    public function register(Request $request){

        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'name' => $request->firstname .' '. $request->middlename. ' '. $request->lastname,
            'created_at' => now()
        ];
        $result = User::insert($data);

        if($result){
            return redirect('/register')->with('register', 'You have successfully Register a Account.');
        }

    }
    public function login(Request $request){
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $account = User::where('username', $request->username)->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
        }

        Auth::login($account);
        return redirect('/home')->with('login_success', 'You have successfully logged in.');
    }
    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        Auth::logout();

        // Redirect to the homepage or login page
        return redirect('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // Get the user information from Google
            $user = Socialite::driver($provider)->user();
        } catch (Throwable $e) {
            return redirect('/')->with('error', 'Authentication failed.');
        }

        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // Log the user in if they already exist
            Auth::login($existingUser);
        } else {
            // Otherwise, create a new user and log them in
            $newUser = User::updateOrCreate([
                'email' => $user->email
            ], [
                'name' => $user->name,
                'password' => bcrypt(Str::random(16)), // Set a random password
                'created_at' => now(),
            ]);
            Auth::login($newUser);
        }

        // Redirect the user to the dashboard or any other secure page
        return redirect('/home')->with('login_success', 'You have successfully logged in.');
    }
}
