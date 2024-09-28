@extends('app')


@section('content')

    <div class="container mx-auto px-4">
        <div class="flex pb-12 border-b border-cyan-800">
            <div class="flex-none">
                <img src="{{ Storage::url('photos/'.$book->image) }}" alt="{{ $book->name }}" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
            </div>

            <div class="pl-12">
                @if(isset($result))
                    <span>{{$result}}</span>
                @endif
                <div class="flex justify-between">
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

                <div class="mt-12">
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
                </div>
            </div>


        </div>
    </div>
@endsection
