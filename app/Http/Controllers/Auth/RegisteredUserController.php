<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisterUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */




    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date'],
            'banniere' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'remember_token' => bcrypt(Str::random(16))
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'banniere' => $request->banniere,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'remember_token' => $request->remember_token,
        ]);

        event(new Registered($user));
        //$user->notify(new RegisterUser());
        //Auth::login($user);
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.send')->with('success', 'Un lien de validation vous a été envoyé...');
       // return redirect('/','verification.send')->with('success','Un lien de validation vous a été envoyé...');
    }


     public function confirm($id, $token) {
        $user = User::where('id', $id)->where('remember_token', $token)->first();

        if ($user) {
            $user->update(['remember_token' => null]);
            $this->guard()->login($user);
            return redirect($this->redirectPath())->with('success', 'Adresse bien confirmée');
        } else {
            return redirect('/')->with('error', 'Le lien n\'est pas valide');
        }
    }


}
