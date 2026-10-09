<x-guest-layout>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa password? Masukkan email Anda dan kami akan mengirimkan kode verifikasi OTP 6 digit ke email Anda.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if (session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 text-sm rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.otp.send') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Akun KejarHijau')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="contoh@gmail.com" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Kembali ke Login') }}
            </a>
        </div>

        <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Lupa Password?</h2>
            <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Masukkan email Anda dan kami akan mengirimkan kode verifikasi OTP 6 digit ke email Anda via Resend.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if (session('error'))
                <div class="mb-4 p-3.5 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-sm rounded-lg border border-red-200 dark:border-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.otp.send') }}" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email Akun KejarHijau')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        placeholder="contoh@gmail.com" 
                        required 
                        autofocus 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                </div>

                <div class="flex items-center justify-between pt-2">
                    <a class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" href="{{ route('login') }}">
                        &larr; {{ __('Kembali ke Login') }}
                    </a>

                    <button 
                        type="submit" 
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm transition duration-150"
                    >
                        {{ __('Kirim Kode OTP') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
