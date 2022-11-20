<x-guest-layout>



        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4 text-sm text-gray-600" style="text-align: right">
                {{ __('نسيت رقمك السري؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل لك عبر البريد الإلكتروني رابط إعادة تعيين كلمة المرور الذي سيسمح لك باختيار عنوان جديد.') }}
            </div>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('البريد الألكتروني')" style="text-align: right" />

                <x-text-input id="email" class="block mt-1 w-full" type="email"  name="email" :value="old('email')" required autofocus  />

                <x-input-error :messages="$errors->get('email')" class="mt-2" style="text-align: right" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

</x-guest-layout>
