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
                    <li><a href="#" class="hover:text-cyan-400">Aggiungi libro</a></li>
                    <li><a href="{{route('users.index')}}" class="hover:text-cyan-400">Gestione Utenti</a></li>
                    <li><a href="{{route('users.create')}}" class="hover:text-cyan-400">Registrati!</a></li>
                </ul>
            </div>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-cyan-800 text-sm rounded-full px-3 py-1 pl-8 w-64 focus:outline-none  focus:shadow-outline " placeholder="Cerca">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" class="fill-current text-cyan-400 w-4">
                            <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 19.585938 21.585938 C 20.137937 22.137937 21.033938 22.137938 21.585938 21.585938 C 22.137938 21.033938 22.137938 20.137938 21.585938 19.585938 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-6">

                </div>
            </div>
        </nav>
    </header>
    <main class="py-8 px-6">
        @yield('content')
    </main>
<footer class="bprder-t border-cyan-800">
    <div class="container mx-auto px-4 py-6">
        Made by Cristian Pantea - September 28th, 2024
    </div>
</footer>

</body>
</html>
