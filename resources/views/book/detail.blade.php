@extends('app')


@section('content')

    <div class="container mx-auto px-4">
        <div class="flex pb-12 border-b border-cyan-800">
            <div class="flex-none max-w-96">
                <img src="{{ Storage::url('photos/'.$book->image) }}" alt="{{ $book->name }}" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
            </div>

            <div class="pl-12 w-full">
                @if(isset($result))
                    <span>{{$result}}</span>
                @endif
                <div class="flex justify-between ">
                    <h2 class="font-semibold text-4xl uppercase tracking-wide">
                        {{ $book->name }}
                    </h2>
                    <p class="text-gray-200 mb-4 text-4xl font-bold">
                        Prezzo: &euro; {{ $book->price }}
                    </p>
                </div>
                <p class="mt-12 text-justify">
                    {{ $book->description }}
                </p>

                <div class="mt-12 flex justify-between">
                    <form method="POST" action="{{route('book.toggle', $book)}}">
                        @csrf
                        <button type="submit" class="px-5 py-3 bg-orange-600 rounded-lg" >
                            @if($book->isFavorite())
                                Rimuovi dai favoriti
                            @else
                                Aggiungi ai favoriti
                            @endif
                        </button>
                    </form>
                    <a href="{{route('books.edit', $book)}}" class="px-5 py-3 bg-green-600 rounded-lg" >
                        Modifica libro
                    </a>
                    <form method="POST" action="{{route('books.destroy', $book)}}" onsubmit="return confirm('Are you sure you want to delete this book?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-3 bg-red-600 rounded-lg" >
                            Elimina libro
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
