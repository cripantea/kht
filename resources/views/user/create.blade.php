@extends('app')

@section('content')



    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md text-cyan-900">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h2 class="text-2xl font-bold mb-6">Nuovo Utente</h2>
        </div>
        <form action="/register" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" class=" mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci il nome" required>
            </div>

            <!-- Email Utente -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci l'email" required>
            </div>

            <!-- Password Utente -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci la password" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Conferma Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci la password" required>
            </div>

            <!-- Ruolo Utente (Toggle) -->
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isAdmin)
                <div class="flex items-center">
                    <label for="toggle" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input id="toggle" name='isAdmin' type="checkbox" class="hidden" />
                            <div class="block bg-gray-400 w-14 h-8 rounded-full"></div>
                            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                        </div>
                        <div class="ml-3 text-gray-700">Admin</div>
                    </label>
                </div>
            @endif



            <!-- Azioni -->
            <div class="flex justify-end space-x-4">
                <button type="reset" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Annulla</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Salva</button>
            </div>
        </form>
    </div>
<style scoped>

    /* Custom styles for toggle effect */
    input:checked ~ .block {
        background-color: #48bb78; /* Green color when checked */
    }
    input:checked ~ .dot {
        transform: translateX(100%); /* Move the dot to the right */
    }
</style>


@endsection
