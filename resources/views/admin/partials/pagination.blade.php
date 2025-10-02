<div class="text-sm text-gray-700 dark:text-gray-300 mb-4 md:mb-0">
    Menampilkan
    <span class="font-semibold">{{ $paginator->firstItem() ?? 0 }}</span> -
    <span class="font-semibold">{{ $paginator->lastItem() ?? 0 }}</span> dari
    <span class="font-semibold">{{ $paginator->total() }}</span> pengguna
</div>

<div class="flex items-center space-x-2">
    <a href="{{ $paginator->previousPageUrl() }}"
        class="px-3 py-1 rounded-md {{ $paginator->onFirstPage() ? 'bg-gray-200 dark:bg-gray-600 text-gray-400 dark:text-gray-500 cursor-not-allowed' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }} transition-colors duration-300">
        Sebelumnya
    </a>

    @if ($paginator->lastPage() > 1)
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <a href="{{ $paginator->url($i) }}"
                class="px-3 py-1 rounded-md {{ $paginator->currentPage() == $i ? 'bg-neon-blue text-white shadow-neon-blue' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }} transition-colors duration-300">
                {{ $i }}
            </a>
        @endfor
    @endif


    <a href="{{ $paginator->nextPageUrl() }}"
        class="px-3 py-1 rounded-md {{ $paginator->hasMorePages() ? 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' : 'bg-gray-200 dark:bg-gray-600 text-gray-400 dark:text-gray-500 cursor-not-allowed' }} transition-colors duration-300">
        Selanjutnya
    </a>
</div>