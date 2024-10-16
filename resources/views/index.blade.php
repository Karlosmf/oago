<!DOCTYPE html>
<!-- CARLOS -->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-gray-200 text-gray-900">
    <x-web-navbar />
    <!--livewire:web-navbar /-->
    <livewire:web-search-filter />
    <livewire:web-product title="Productos Destacados" :filter="['featured' => true]" />
    <livewire:web-product title="Productos Publicados" :filter="['published' => true]" />
</body>
</html>