<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center p-6 bg-gray-50 dark:bg-gray-900">
        <div class="mb-6">
            <a href="/" class="flex items-center gap-3">
                <x-application-logo class="w-12 h-12 fill-current text-emerald-600 dark:text-emerald-400" />
                <span class="text-2xl font-bold text-gray-900 dark:text-white">KejarHijau</span>
            </a>
        </div>

        <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Verifikasi OTP & Reset Password</h2>
            <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Masukkan kode OTP 6 digit yang telah dikirimkan ke email Anda, lalu tentukan password baru.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if (session('error'))
                <div class="mb-4 p-3.5 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-sm rounded-lg border border-red-200 dark:border-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.otp.update') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" class="block mt-1.5 w-full bg-gray-50 dark:bg-gray-900 rounded-lg text-sm py-2.5 px-3.5" type="email" name="email" :value="old('email', $email)" required readonly />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                </div>

                <!-- Kode OTP 6 Digit -->
                <div>
                    <x-input-label for="otp" :value="__('Kode OTP (6 Digit)')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="otp" class="block mt-1.5 w-full text-center tracking-widest text-2xl font-mono font-bold uppercase rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 py-2.5" type="text" name="otp" maxlength="6" pattern="[0-9]{6}" inputmode="numeric" placeholder="123456" :value="old('otp')" required autofocus autocomplete="one-time-code" />
                    <x-input-error :messages="$errors->get('otp')" class="mt-1.5" />
                </div>

                <!-- Password Baru -->
                <div>
                    <x-input-label for="password" :value="__('Password Baru')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password Baru')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" href="{{ route('login') }}">
                        &larr; {{ __('Kembali ke Login') }}
                    </a>

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm transition duration-150">
                        {{ __('Simpan Password Baru') }}
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700 text-center">
                <form method="POST" action="{{ route('password.otp.send') }}" class="inline">
                    @csrf
                    <input type="hidden" name="email" value="{{ old('email', $email) }}">
                    <button type="submit" class="text-xs text-emerald-600 dark:text-emerald-400 underline hover:text-emerald-700 font-medium">
                        {{ __('Belum menerima kode? Kirim Ulang OTP') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
