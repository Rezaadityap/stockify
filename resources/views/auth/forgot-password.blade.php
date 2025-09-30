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
            <h1
                class="text-3xl font-bold bg-clip-text mb-3 text-transparent bg-gradient-to-r from-neon-blue to-neon-pink">
                Lupa Password
            </h1>
            <p class="text-gray-400 mt-2">Masukkan email kamu, kami akan kirim link reset password ke email tersebut.
            </p>
        </div>

        <form method="POST" action="{{ route('password.email') }}" id="login-form" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input type="text" id="email" name="email"
                    class="text-input focus:shadow-[0_0_10px_rgba(0,217,255,0.5)] focus:ring-2 focus:ring-neon-blue focus:border-transparent"
                    placeholder="Masukkan email kamu" autocomplete="email" autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}"
                    class="text-sm text-neon-blue hover:text-neon-pink transition-colors duration-300">Sudah ingat
                    passwordnya?</a>
            </div>

            <button type="submit" id="submit-button"
                class="w-full py-3 px-4 bg-gradient-to-r from-neon-blue to-neon-pink text-white font-medium rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg hover:shadow-neon-blue/30">
                Kirim Kode Reset Password
            </button>
        </form>
    </div>
</body>

</html>