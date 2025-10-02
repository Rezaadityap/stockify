@extends('layouts.admin')
@section('title')
    Pengguna
@endsection
@section('content')
    <main class="p-4 md:p-6">
        <div class="mb-4">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Data Pengguna</h1>
            <p class="text-gray-600 dark:text-gray-300">Kelola informasi pengguna sistem dengan mudah</p>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <a href="{{ route('pengguna.create') }}"
                class="px-4 py-2 bg-neon-blue text-white rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-neon-blue hover:shadow-lg w-full sm:w-auto">
                <i class="fas fa-plus"></i>
                Tambah Pengguna
            </a>
            <div class="relative w-full sm:w-1/3">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
                <input type="text" id="search-input" placeholder="Cari pengguna..."
                    class="w-full pl-10 pr-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-neon-blue">
            </div>
        </div>


        <div id="user-data-container"
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <th class="py-4 px-6 text-left font-medium">Pengguna</th>
                            <th class="py-4 px-6 text-left font-medium">Email</th>
                            <th class="py-4 px-6 text-left font-medium">Peran</th>
                            <th class="py-4 px-6 text-left font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @include('admin.partials.pengguna_table', ['user' => $user])
                    </tbody>
                </table>
            </div>

            <div id="pagination-container"
                class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center">
                @include('admin.partials.pagination', ['paginator' => $user])
            </div>
        </div>
    </main>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                function fetchData(url) {
                    $.ajax({
                        url: url,
                        success: function (data) {
                            $('#user-table-body').html(data.table);
                            $('#pagination-container').html(data.pagination);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error: " + error);
                        }
                    });
                }

                let searchTimeout;
                $('#search-input').on('keyup', function () {
                    clearTimeout(searchTimeout);
                    const query = $(this).val();
                    const url = "{{ route('pengguna.index') }}?search=" + query;

                    searchTimeout = setTimeout(function () {
                        fetchData(url);
                    }, 300);
                });

                $(document).on('click', '#pagination-container a', function (event) {
                    event.preventDefault();
                    const url = $(this).attr('href');
                    if (url) {

                        fetchData(url);
                    }
                });
            });
        </script>
    @endpush
@endsection