<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kampung Cengek </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-yellow-100 shadow">
                <div class="max-w-7xl mx-auto py-8 px-6 sm:px-8 lg:px-10 flex items-center justify-center">
                    <div class="flex flex-col items-center space-y-4">
                        <!-- Profile Icon -->
                        <div class="flex items-center justify-center w-16 h-16 bg-yellow-300 rounded-full shadow-lg">
                            <svg class="w-10 h-10 text-yellow-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A8.954 8.954 0 0112 15a8.954 8.954 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <!-- Profile Text -->
                        <div class="text-center">
                            <h2 class="text-xl font-semibold text-yellow-700">Profile</h2>
                            <p class="text-md font-medium text-yellow-600">Welcome to your profile</p>
                        </div>
                    </div>
                </div>
            </header>
        @endif


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>