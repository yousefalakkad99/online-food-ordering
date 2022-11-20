<x-guest-layout>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3 style="text-align: center"><span>VIP Order</span></h3>

            <x-input-label for="email" :value="__('البريد الألكتروني')" style="text-align: right" />
            <x-text-input id="email" placeholder="البريد الألكتروني" class="block mt-1 w-full" style="text-align: right" type="email" name="email" :value="old('email')" required  autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="text-align: right"  />



                <x-input-label for="كلمة السر" :value="__('كلمة السر')" style="text-align: right"/>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="كلمة السر"
                                required autocomplete="current-password" style="text-align: right" />

                <x-input-error :messages="$errors->get('password')" style="text-align: right" class="mt-2"  />

                     <!-- Remember Me -->
                     {{-- <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}"  style="text-align: right">
                                {{ __('هل نسيت كلمة السر؟') }}
                            </a>
                        @endif
                     </div> --}}

            <button type="submit" style="background-color: green; color:white">تسجيل الدخول</button>
            <button type="submit" style="background-color: rgb(128, 107, 0); color:white"><a href="{{ route('register') }}">أنشاء حساب</a></button>

            {{-- <div class="social">
              <div class="go"><i class="fab fa-google"></i>  Google</div>
              <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>

            </div> --}}
        </form>

        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form> --}}

</x-guest-layout>
