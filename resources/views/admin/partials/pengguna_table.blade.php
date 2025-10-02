@forelse ($user as $item)
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
@empty
    <tr>
        <td colspan="4" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">
            Data pengguna tidak ditemukan.
        </td>
    </tr>
@endforelse