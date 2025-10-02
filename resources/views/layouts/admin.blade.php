<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }

        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }

        ::-webkit-scrollbar-thumb {
            background: #c5c5c5;
            border-radius: 3px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #6b7280;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 5px currentColor;
            }

            50% {
                box-shadow: 0 0 15px currentColor;
            }

            100% {
                box-shadow: 0 0 5px currentColor;
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-dark transition-colors duration-300">
    <!-- Main Container -->
    <div class="flex h-screen overflow-hidden">
        @include('admin.components.sidebar')
        <!-- Main Content -->
        <div class="ml-0 md:ml-64 flex-1 overflow-x-hidden">
            @include('admin.components.header')
            <!-- Main Content Area -->
            @yield('content')
        </div>
    </div>
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>