<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)//: RedirectResponse
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'profile'=> ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $image = $request->file('image');
        if(empty($image)){
            echo 123;
        }
        else{
            $path = 'assets/image';
            $image1 = time().'_'.$image->getClientOriginalName();
            $image->move($path,$image1);
        }
       

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->email,
            'profile'=> $image1,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME); 
    }

    // public function store(Request $request){
    //         $image = $request->file('image');
    //         if(empty($image)){
    //             echo 123;
    //         }
    //         else{
    //             $path = 'assets/image';
    //             $image1 = time().'_'.$image->getClientOriginalName();
    //             $image->move($path,$image1);
    //         }
    //         echo "Error";
    // }
}
