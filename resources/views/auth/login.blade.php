<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body
    class="min-h-screen flex justify-center items-center overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
    <!-- Background elements -->
    <div class="absolute top-0 right-0 w-[300px] h-[300px] rounded-full bg-[rgba(0,217,255,0.1)] blur-[60px] z-0"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] rounded-full bg-[rgba(255,0,255,0.1)] blur-[60px] z-0">
    </div>

    <!-- Login form container -->
    <div
        class="backdrop-blur-[10px] border border-white/10 relative z-10 bg-gray-800/30 p-8 rounded-xl w-full max-w-md mx-4">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-neon-blue to-neon-pink">
                LOGIN
            </h1>
            <p class="text-gray-400 mt-2">Selamat datang kembali</p>
        </div>

        <form method="POST" action="{{ route('login') }}" id="login-form" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                <input type="text" id="username" name="username"
                    class="text-input focus:shadow-[0_0_10px_rgba(0,217,255,0.5)] focus:ring-2 focus:ring-neon-blue focus:border-transparent"
                    placeholder="Masukkan username kamu" autocomplete="username" autofocus />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="text-input focus:shadow-[0_0_10px_rgba(0,217,255,0.5)] focus:ring-2 focus:ring-neon-blue focus:border-transparent pr-10"
                        placeholder="Masukkan password kamu" autocomplete="current-password" />
                    <button type="button" id="toggle-password"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="hidden">
                            <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                            <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                            </path>
                            <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                            <line x1="2" x2="22" y1="2" y2="22"></line>
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('password.request') }}"
                    class="text-sm text-neon-blue hover:text-neon-pink transition-colors duration-300">Lupa
                    password?</a>
            </div>

            <button type="submit" id="submit-button"
                class="w-full py-3 px-4 bg-gradient-to-r from-neon-blue to-neon-pink text-white font-medium rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg hover:shadow-neon-blue/30">
                Masuk
            </button>
        </form>
    </div>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        });
    </script>
    @include('sweetalert::alert')
</body>

</html>