@extends('app')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md text-gray-900">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h3>Elenco utenti </h3>

            <a href="{{route('users.create')}}" class="px-3 py-1 bg-blue-500 rounded-lg font-sm text-gray-200">Nuovo utente</a>
    </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    Nome Utente
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    Email
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    Is Admin
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                </td>
            </tr>

            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
@foreach($users as $user)
            <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->isAdmin }}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    @php
                    //    dd($user);
                    @endphp
                    <a href="{{ route('users.edit', $user) }}" class="px-3 py-1 bg-blue-500 rounded-lg font-sm text-gray-200">Edit</a>
                </td>
            </tr>
@endforeach
            </tbody>
        </table>
    </div>

@endsection
