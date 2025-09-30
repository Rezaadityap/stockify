<!-- Sidebar -->
<div class="sidebar glass w-64 fixed h-full overflow-y-auto z-20">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
        <h1
            class="text-xl font-bold bg-gradient-to-r uppercase from-neon-blue to-neon-pink bg-clip-text text-transparent">
            Stockify
        </h1>
        <!-- Close button for mobile -->
        <button id="closeSidebar" class="md:hidden text-gray-700 dark:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200
            {{ Route::is('admin.dashboard') ? 'active-dashboard' : 'text-gray-700 dark:text-white' }}">
            <i class="fas fa-home text-lg mr-3 flex-shrink-0"></i>
            Dashboard
        </a>
        <a href="{{ route('pengguna.index') }}" class="flex items-center px-6 py-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200
            {{ Route::is('pengguna.*') ? 'active-dashboard' : 'text-gray-700 dark:text-white' }}">
            <i class="fas fa-users text-lg mr-3 flex-shrink-0"></i>
            Pengguna
        </a>
        {{-- <a href="#"
            class="flex items-center px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-building text-lg mr-3 flex-shrink-0"></i>
            Outlet
        </a>
        <a href="#"
            class="flex items-center px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-warehouse text-lg mr-3 flex-shrink-0"></i>
            Gudang
        </a>
        <a href="#"
            class="flex items-center px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-cubes text-lg mr-3 flex-shrink-0"></i>
            Bahan Baku
        </a>
        <a href="#"
            class="flex items-center px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-gear text-lg mr-3 flex-shrink-0"></i>
            Pengaturan
        </a>
        <a href="#"
            class="flex items-center px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-file text-lg mr-3 flex-shrink-0"></i>
            Laporan
        </a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-sign-out-alt text-lg mr-3 flex-shrink-0"></i>
                Keluar
            </button>
        </form>
    </nav>
</div>