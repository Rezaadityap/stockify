@extends('layouts.admin')
@section('title')
    Detail Pengguna
@endsection
@section('content')
    <main class="p-4 md:p-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Detail Pengguna</h1>
                    <p class="text-gray-600 dark:text-gray-300">Informasi lengkap pengguna sistem</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('pengguna.index') }}"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- User Detail Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transition-all duration-300">
                    <div class="flex flex-col items-center">
                        @php
                            $words = explode(' ', $user->nama);
                            if (count($words) >= 2) {
                                $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                            } else {
                                $initials = strtoupper(substr($words[0], 0, 2));
                            }
                        @endphp
                        <div
                            class="flex-shrink-0 h-24 w-24 rounded-full bg-gradient-to-r from-neon-blue to-neon-purple flex items-center justify-center text-white font-bold text-3xl shadow-neon-blue mb-4">
                            {{ $initials }}
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $user->nama }}</h2>
                        <span
                            class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 mb-4">
                            {{ $user->role->nama_role }}
                        </span>
                        <p class="text-gray-600 dark:text-gray-300 text-center mb-6">
                            Bergabung sejak {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                        </p>
                        <button
                            class="w-full px-4 py-2 bg-neon-pink text-white rounded-lg hover:bg-pink-500 transition-colors duration-300 shadow-neon-pink hover:shadow-lg flex items-center justify-center"
                            id="ubahPasswordBtn">
                            <i class="fas fa-key mr-2"></i>
                            Ubah Password
                        </button>
                        <a href="{{ route('pengguna.edit', $user->id) }}"
                            class="mt-4 w-full px-4 py-2 bg-neon-purple text-white rounded-lg hover:bg-purple-500 transition-colors duration-300 shadow-neon-purple hover:shadow-lg flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Detail Information -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transition-all duration-300">
                    <h3
                        class="text-xl font-bold text-gray-800 dark:text-white mb-6 pb-2 border-b border-gray-200 dark:border-gray-700">
                        Informasi Pengguna
                    </h3>

                    <div class="space-y-6">
                        <!-- Personal Information -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Informasi Pribadi</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Nama Lengkap</p>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $user->nama }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Username</p>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $user->username }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Email</p>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Nomor HP</p>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $user->no_hp }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Peran</p>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $user->role->nama_role }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Status</p>
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                        { $user->status == 'aktif' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Informasi Akun</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Tanggal Dibuat</p>
                                    <p class="text-gray-800 dark:text-white font-medium">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, H:i') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Terakhir Diperbarui</p>
                                    <p class="text-gray-800 dark:text-white font-medium">
                                        {{ \Carbon\Carbon::parse($user->updated_at)->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Ubah Password -->
    <div id="ubahPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md mx-4 p-6 transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Ubah Password</h3>
                <button id="closeModal"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="ubahPasswordForm" action="{{ route('pengguna.index', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password Baru</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-neon-blue focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>
                    <div>
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-neon-blue focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" id="cancelBtn"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-neon-blue text-white rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-neon-blue hover:shadow-lg">
                        Simpan Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ubahPasswordBtn = document.getElementById('ubahPasswordBtn');
            const ubahPasswordModal = document.getElementById('ubahPasswordModal');
            const closeModal = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');

            ubahPasswordBtn.addEventListener('click', function () {
                ubahPasswordModal.classList.remove('hidden');
            });

            closeModal.addEventListener('click', function () {
                ubahPasswordModal.classList.add('hidden');
            });

            cancelBtn.addEventListener('click', function () {
                ubahPasswordModal.classList.add('hidden');
            });

            // Close modal when clicking outside
            ubahPasswordModal.addEventListener('click', function (e) {
                if (e.target === ubahPasswordModal) {
                    ubahPasswordModal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection