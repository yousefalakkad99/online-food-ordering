<x-guest-layout>


        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h3 style="text-align: center"><span>VIP Order</span></h3>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('الأسم')" style="text-align: right" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus style="text-align: right"/>

                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" style="text-align: right" /> --}}
                    @error('name')
                    <div style="color: red; text-align: right" role="alert">
                    {{$message}}
                    </div>
                    @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('البريد الألكتروني')" style="text-align: right" />

                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"  style="text-align: right"/>

                @error('email')
                <div style="color: red; text-align: right" role="alert">
                {{$message}}
                </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('كلمة السر')" style="text-align: right" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" style="text-align: right" />

                                @error('password')
                                <div style="color: red; text-align: right" role="alert">
                                {{$message}}
                                </div>
                                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('تاكيد كلمة السر')" style="text-align: right" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  style="text-align: right" />

                                @error('password_confirmation')
                                <div style="color: red; text-align: right" role="alert">
                                {{$message}}
                                </div>
                                @enderror

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('مسجل بالفعل؟') }}
                </a>

                <x-primary-button class="ml-4" style="background-color:#d65106; ">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

</x-guest-layout>
