<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Books API') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="bg-gray-100">
    <div class="px-10 font-sans antialiased text-gray-900" id="app">
        <div class="absolute z-50 max-w-lg top-2 right-2" v-if="success != ''">
            <div class="relative flex items-center px-6 py-4 mb-4 text-green-600 bg-green-200 border-0 rounded">
                <span class="inline-block mr-5 text-xl align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                </span>
                <span class="inline-block mr-8 font-bold align-middle">
                    @{{ success }}
                </span>
            </div>
        </div>

        <div class="absolute z-50 max-w-lg top-2 right-2" v-if="error!=''">
            <div class="relative flex items-center px-6 py-4 mb-4 text-red-600 bg-red-200 border-0 rounded ">
                <span class="inline-block mr-5 text-xl align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                </span>
                <span class="inline-block mr-8 font-bold align-middle">
                    @{{ error }}
                </span>
            </div>
        </div>
        {{ $slot }}
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
