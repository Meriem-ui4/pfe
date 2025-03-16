<header class="sticky top-0 z-50 w-full border-b bg-white bg-opacity-95 backdrop-blur">
    <div class="container mx-auto flex h-16 items-center justify-between px-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl">
            <img src="{{ asset('img/logo.ico') }}" alt="Mobilis Logo" class="w-21 h-11 rounded-md" >
        </a>
        
        <nav class="hidden md:flex gap-6">
            <a href="#login" class="text-sm font-medium hover:text-blue-600">Login</a>
            <a href="#dashboard" class="text-sm font-medium hover:text-blue-600">Dashboard</a>
        </nav>
        
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="container mx-auto px-4 py-3 space-y-1">
            <a href="#login" class="block px-3 py-2 text-base font-medium hover:bg-gray-100 rounded-md">Login
            </a>
            <a href="#dashboard" class="block px-3 py-2 text-base font-medium hover:bg-gray-100 rounded-md">Dashboard</a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>