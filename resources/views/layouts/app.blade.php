<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobilis - @yield('title', 'Accueil')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('styles')
</head>
<body class="flex flex-col min-h-screen">
@if (Request::is('admin/reclamations'))
    @include('partials.header-admin')
    @else 

    @include('partials.header-user')
@endif
    
    <main class="flex-grow">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 container mx-auto mt-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    
    @if(Request::routeIs('home'))
    @include('partials.footer')
@endif


    
    @yield('scripts')
    
</body>
</html>