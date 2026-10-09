<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center p-6 bg-gray-50 dark:bg-gray-900">
        <div class="mb-6">
            <a href="/" class="flex items-center gap-3">
                <x-application-logo class="w-12 h-12 fill-current text-emerald-600 dark:text-emerald-400" />
                <span class="text-2xl font-bold text-gray-900 dark:text-white">KejarHijau</span>
            </a>
        </div>

        <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Reset Password</h2>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password Baru')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="font-medium text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
                </div>

                <div class="flex items-center justify-end pt-2">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm transition duration-150">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
