<header class="glass shadow-sm p-4 flex justify-between items-center">
    <!-- Hamburger Menu -->
    <button id="hamburger" class="md:hidden text-gray-700 dark:text-gray-300 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Page Title -->
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white hidden md:block">@yield('title')</h2>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
        <button id="darkModeToggle"
            class="relative w-12 h-6 rounded-full bg-gray-300 dark:bg-gray-700 transition-colors duration-300 focus:outline-none">
            <div id="toggleThumb"
                class="absolute top-1 left-1 w-4 h-4 rounded-full bg-white transition-transform duration-300">
            </div>
        </button>

        <!-- User Profile -->
        <div class="flex items-center space-x-2 cursor-pointer group">
            <div
                class="w-8 h-8 bg-gradient-to-r from-neon-blue to-neon-purple rounded-full flex items-center justify-center text-white font-bold">
                A</div>
            <span
                class="text-gray-700 dark:text-gray-300 hidden md:inline group-hover:text-neon-blue transition-colors duration-200">{{ Auth::user()->nama }}</span>
        </div>
    </div>
</header>