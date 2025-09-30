@extends('layouts.admin')
@section('title')
    Pengguna
@endsection
@section('content')
    <main class="p-4 md:p-6">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Data Pengguna</h1>
            <p class="text-gray-600 dark:text-gray-300">Kelola informasi pengguna sistem dengan mudah</p>
        </div>
        <a href="{{ route('pengguna.create') }}"
            class="px-4 py-2 bg-neon-blue text-white rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-neon-blue hover:shadow-lg">
            <i class="fas fa-plus"></i>
            Tambah Pengguna
        </a>
        <!-- Table Container -->
        <div
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 mt-8">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <th class="py-4 px-6 text-left font-medium">
                                <div class="flex items-center">
                                    <span>Pengguna</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-4 px-6 text-left font-medium">
                                <div class="flex items-center">
                                    <span>Email</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-4 px-6 text-left font-medium">
                                <div class="flex items-center">
                                    <span>Peran</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-4 px-6 text-left font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($user as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        @php
                                            $words = explode(' ', $item->nama);
                                            if (count($words) >= 2) {
                                                $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                                            } else {
                                                $initials = strtoupper(substr($words[0], 0, 2));
                                            }
                                        @endphp
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-neon-blue to-neon-purple flex items-center justify-center text-white font-bold shadow-neon-blue">
                                            {{ $initials }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->nama }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-900 dark:text-white">{{ $item->email }}</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                        {{ $item->role->nama_role }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('pengguna.show', $item->id) }}"
                                            class="text-neon-blue hover:text-blue-500 transition-colors duration-300 cursor-pointer">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pengguna.edit', $item->id) }}"
                                            class="text-neon-purple hover:text-purple-500 transition-colors duration-300">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('pengguna.destroy', $item->id) }}" data-confirm-delete="true"
                                            class="text-neon-pink hover:text-pink-500 transition-colors duration-300">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div
                class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center">
                <!-- Info -->
                <div class="text-sm text-gray-700 dark:text-gray-300 mb-4 md:mb-0">
                    Menampilkan
                    <span class="font-semibold">{{ $user->firstItem() }}</span> -
                    <span class="font-semibold">{{ $user->lastItem() }}</span> dari
                    <span class="font-semibold">{{ $user->total() }}</span> pengguna
                </div>

                <!-- Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Previous -->
                    <a href="{{ $user->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md {{ $user->onFirstPage() ? 'bg-gray-200 dark:bg-gray-600 text-gray-400 dark:text-gray-500 cursor-not-allowed' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }} transition-colors duration-300">
                        Sebelumnya
                    </a>

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $user->lastPage(); $i++)
                        <a href="{{ $user->url($i) }}"
                            class="px-3 py-1 rounded-md {{ $user->currentPage() == $i ? 'bg-neon-blue text-white shadow-neon-blue' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }} transition-colors duration-300">
                            {{ $i }}
                        </a>
                    @endfor

                    <!-- Next -->
                    <a href="{{ $user->nextPageUrl() }}"
                        class="px-3 py-1 rounded-md {{ $user->hasMorePages() ? 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' : 'bg-gray-200 dark:bg-gray-600 text-gray-400 dark:text-gray-500 cursor-not-allowed' }} transition-colors duration-300">
                        Selanjutnya
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection