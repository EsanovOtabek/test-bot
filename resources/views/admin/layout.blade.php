<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Quiz Admin Panel">
    <title>@yield('title') | Quiz Admin</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">
<!-- Main Layout -->
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('admin.include.sidebar')
    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Top Navigation -->
        <header class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200">
            <!-- Mobile menu button -->
            <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-500 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Search & User Info -->
            <div class="flex items-center space-x-4">
                <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                    <input class="pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500" type="text" placeholder="Qidirish...">
                </div>

                <div class="flex items-center">
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="ml-1 fas fa-chevron-down text-gray-500"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50">Chiqish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mobile Sidebar (hidden by default) -->
        <div x-show="sidebarOpen" class="md:hidden fixed inset-0 z-40">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="sidebarOpen = false"></div>
            <div class="relative flex flex-col w-72 max-w-xs h-full bg-white">
                <div class="flex items-center justify-center h-16 px-4 bg-green-600">
                    <span class="text-white font-bold text-xl">Quiz Admin</span>
                </div>
                <div class="flex-1 overflow-y-auto py-4">
                    <nav class="px-2 space-y-1">
                        <!-- Same navigation items as desktop sidebar -->
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                            <i class="fas fa-tachometer-alt mr-3 text-green-600"></i>
                            Dashboard
                        </a>
                        <!-- Other menu items... -->
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('page_title')</h1>
                <div class="flex space-x-2">
                    @yield('action_buttons')
                </div>
            </div>

            <!-- Breadcrumbs -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.index') }}" class="inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700">
                            <i class="fas fa-home mr-2"></i>
                            Dashboard
                        </a>
                    </li>
                    @yield('breadcrumbs')
                </ol>
            </nav>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow p-6">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    // Toastr notifications
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
        toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
        toastr.error("{{ session('error') }}");
        @endif

        // Dropdown menu toggle
        document.querySelectorAll('[data-dropdown-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const dropdown = document.getElementById(button.getAttribute('data-dropdown-toggle'));
                dropdown.classList.toggle('hidden');
            });
        });
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        if (!e.target.matches('[data-dropdown-toggle]')) {
            document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            });
        }
    });
</script>

@stack('scripts')
</body>
</html>
