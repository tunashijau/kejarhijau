<x-guest-layout>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 bg-white dark:bg-gray-900">
        <!-- ================================================================= -->
        <!-- SEBELAH KIRI: GAMBAR COVER FULL (HALAMAN LOGIN)                   -->
        <!-- ================================================================= -->
        <div class="relative hidden lg:block bg-slate-950 text-white overflow-hidden border-r border-slate-800">
            <!-- PETUNJUK UNTUK MENEMPELKAN / MENGGANTI GAMBAR: -->
            <img 
                src="{{ asset('images/image.png') }}" 
                alt="Login Background Visual" 
                class="absolute inset-0 w-full h-full object-cover z-0"
                onerror="this.style.display='none'"
            />

            <!-- Overlay Gradien Tipis -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-slate-950/40 z-10 pointer-events-none"></div>

            <!-- Decorative Glow Fallback jika gambar belum dimuat -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-900/30 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Konten di Atas Gambar (Logo & Copyright) -->
            <div class="relative z-20 flex flex-col justify-between h-full p-12">
                <!-- Top Brand Logo / Header Kiri -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-3 group">
                        <x-application-logo class="w-10 h-10 fill-current text-emerald-400 group-hover:scale-105 transition-transform" />
                        <span class="text-xl font-bold tracking-tight text-white drop-shadow-md">KejarHijau</span>
                    </a>
                </div>

                <!-- Middle Area (Kosong agar gambar terlihat penuh) -->
                <div class="my-auto"></div>

                <!-- Bottom Left Footer Info -->
                <div class="text-xs text-slate-300/80 drop-shadow-md">
                    &copy; {{ date('Y') }} KejarHijau. All rights reserved.
                </div>
            </div>
        </div>

        <!-- ================================================================= -->
        <!-- SEBELAH KANAN: FORM LOGIN                                         -->
        <!-- ================================================================= -->
        <div class="flex flex-col justify-between p-6 sm:p-10 lg:p-16 pb-28 sm:pb-28 lg:pb-16 min-h-screen">
            <!-- Top Right Navigation Link (Desktop) / Mobile Brand Logo -->
            <div class="flex justify-between sm:justify-end items-center w-full">
                <!-- Mobile Logo Header -->
                <a href="/" class="lg:hidden flex items-center gap-2">
                    <x-application-logo class="w-8 h-8 fill-current text-emerald-600 dark:text-emerald-400" />
                    <span class="font-bold text-gray-900 dark:text-white">KejarHijau</span>
                </a>
                <div class="hidden sm:block text-sm text-gray-600 dark:text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 hover:underline ms-1 inline-flex items-center gap-1">
                        Daftar &rarr;
                    </a>
                </div>
            </div>

            <!-- Main Form Container -->
            <div class="w-full max-w-md mx-auto my-auto py-8">
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Masuk ke KejarHijau
                    </h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Masukkan email dan password akun Anda untuk melanjutkan.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="nama@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input 
                            id="password" 
                            class="block mt-1.5 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3.5" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="rounded border-gray-300 dark:border-gray-700 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:bg-gray-900" 
                                name="remember"
                            >
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-2.5 px-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition duration-150 ease-in-out flex items-center justify-center gap-2 text-sm"
                        >
                            <span>{{ __('Masuk') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Bottom Spacer / Footer -->
            <div class="text-center sm:text-left text-xs text-gray-400 dark:text-gray-600 pt-4">
                KejarHijau Auth Portal
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- NAVIGASI BOTTOM BAR MOBILE (TAMPILAN KHUSUS HP/MOBILE)            -->
    <!-- ================================================================= -->
    <div class="lg:hidden fixed bottom-0 inset-x-0 z-50 p-3 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200/80 dark:border-gray-800/80 shadow-2xl">
        <div class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
            <!-- Tombol Masuk (Login) -->
            <a 
                href="{{ route('login') }}" 
                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-semibold text-sm transition-all duration-150 bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/30 ring-2 ring-emerald-500/50"
            >
                <!-- Icon Login -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                <span>Masuk</span>
            </a>

            <!-- Tombol Daftar (Register) -->
            <a 
                href="{{ route('register') }}" 
                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 bg-emerald-600/15 hover:bg-emerald-600/25 text-emerald-700 dark:text-emerald-300 border border-emerald-600/30"
            >
                <!-- Icon Register -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span>Daftar</span>
            </a>
        </div>
    </div>
</x-guest-layout>
