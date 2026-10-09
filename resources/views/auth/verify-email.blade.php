<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center p-6 bg-gray-50 dark:bg-gray-900">
        <div class="mb-6">
            <a href="/" class="flex items-center gap-3">
                <x-application-logo class="w-12 h-12 fill-current text-emerald-600 dark:text-emerald-400" />
                <span class="text-2xl font-bold text-gray-900 dark:text-white">KejarHijau</span>
            </a>
        </div>

        <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Verifikasi Email</h2>
            <div class="mb-6 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik link yang telah kami kirimkan ke email Anda.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 p-3.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-sm rounded-lg border border-emerald-200 dark:border-emerald-800 font-medium">
                    {{ __('Link verifikasi baru telah dikirimkan ke alamat email yang Anda daftarkan.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-sm transition duration-150">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md">
                        {{ __('Keluar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
