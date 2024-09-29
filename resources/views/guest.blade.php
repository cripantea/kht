<!doctype html>
<html class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-cyan-900 text-white">
    <header class="border-b border-cyan-800">
        <nav class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center">
                <a href="/">
                    <img src="https://khtwaters.com/wp-content/uploads/LOGO-KHT.png" alt="Vetrina libri" class="w-12 flex-none">
                </a>
                <ul class="flex ml-16 space-x-8">
                    <li><a href="{{route('books.index')}}" class="hover:text-cyan-400">Pagina principale</a></li>
                    <li><a href="/register" class="hover:text-cyan-400">Registrati!</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="py-8 px-6">
        @yield('content')
    </main>
<footer class="border-t border-cyan-800 sticky bottom-0">
    <div class="container mx-auto px-4 py-6 text-center">
        Made by Cristian Pantea - September 28th, 2024
    </div>
</footer>

</body>
</html>
