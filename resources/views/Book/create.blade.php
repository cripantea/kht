@extends('app')

@section('content')



    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md text-cyan-900">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h2 class="text-2xl font-bold mb-6">Nuovo Libro</h2>
        </div>
        <form action="/books" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" class=" mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci il nome" required>
            </div>

            <!-- Email Utente -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descrizione</label>
                <textarea name="description" id="description" class="w-full mt-1 border border-gray-300 h-24"></textarea>
            </div>

            <!-- Password Utente -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Prezzo</label>
                <input type="number" name="price" id="price" step="0.01" class="text-right text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Inserisci il prezzo" required>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Imagine</label>
                <input type="file" name="image" id="image" class="text-gray-900 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" required>
            </div>

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
