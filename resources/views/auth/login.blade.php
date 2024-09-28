@extends('guest')

@section('content')

    <div class="max-w-3xl mx-auto bg-cyan-800 p-8 rounded-lg shadow-md text-gray-100">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h2 class="text-2xl font-bold mb-6">Login utente</h2>
        </div>
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-100">Email</label>
                <input type="email" name="email" id="email" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci l'email" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                <input type="password" name="password" id="password" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci la password" required>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Salva</button>
                <button type="reset" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Annulla</button>
            </div>
        </form>
    </div>


@endsection
