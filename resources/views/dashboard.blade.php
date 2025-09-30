@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <main class="p-4 md:p-6">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Stat 1 -->
            <div
                class="glass rounded-xl p-5 fade-in border-l-4 border-neon-blue hover:shadow-neon-blue transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Total Pengguna</p>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">12,584</h3>
                    </div>
                    <div
                        class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-neon-blue pulse-glow">
                        <i class="fas fa-users text-white text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div
                class="glass rounded-xl p-5 fade-in border-l-4 border-neon-pink hover:shadow-neon-pink transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Total Outlet</p>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">$42,389</h3>
                    </div>
                    <div
                        class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-pink-400 to-neon-pink p-3 rounded-full pulse-glow text-pink-500">
                        <i class="fas fa-building text-white text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div
                class="glass rounded-xl p-5 fade-in border-l-4 border-neon-purple hover:shadow-neon-purple transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Total Gudang</p>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">1,258</h3>
                    </div>
                    <div
                        class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-400 to-neon-purple p-3 rounded-full pulse-glow text-purple-500">
                        <i class="fas fa-warehouse text-white text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Stat 4 -->
            <div
                class="glass rounded-xl p-5 fade-in border-l-4 border-neon-blue hover:shadow-neon-blue transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Total Bahan Baku</p>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">4.8%</h3>
                    </div>
                    <div
                        class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-400 to-neon-blue p-3 rounded-full pulse-glow text-blue-500">
                        <i class="fas fa-cubes text-white text-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Chart 1 -->
            <div class="glass rounded-xl p-5 fade-in">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Grafik Permintaan</h3>
                    <div class="flex items-center space-x-2">
                        <label for="year1" class="text-sm text-gray-600 dark:text-gray-400">Tahun:</label>
                        <select id="year1"
                            class="glass border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue p-2">
                            <option value="2023">2023</option>
                            <option value="2024" selected>2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Chart 2 -->
            <div class="glass rounded-xl p-5 fade-in">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Grafik Pengembalian</h3>
                    <div class="flex items-center space-x-2">
                        <label for="year2" class="text-sm text-gray-600 dark:text-gray-400">Tahun:</label>
                        <select id="year2"
                            class="glass border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue p-2">
                            <option value="2023">2023</option>
                            <option value="2024" selected>2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>
    </main>
@endsection