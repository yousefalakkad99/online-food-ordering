<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'name.required'=>'يرجى أدخال الأسم',
            'email.required'=>'يرجى أدخال البريد الألكتروني ',
            'password.required'=>'يرجى أدخال كلمة السر',
            'password.confirmed'=>'تأكيد كلمة المرور غير متطابق.',
            'email.email'=>'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا',
            'email.unique'=>'البريد الإلكتروني تم أخذه.',

            'password.min'=>'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل..',
        ]

    );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
