@extends('app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-cyan-500 uppercase tracking-wide font-semibold mb-8 text-2xl">
            I nostri libri
        </h2>
        <div class="books text-sm grid sm:grid-cols-2, md:grid-cols-3, lg:grid-cols-4, xl:grid-cols-6 gap-12 border-b border-cyan-800">
            @foreach($books as $book)

            <div class="book mt-2 border-b border-cyan-800 pb-8">
                <div class="relative inline-block w-full">
                    <a href="#">
                        <img src="{{ Storage::url('photos/'.$book->image) }}" alt="no" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
                    </a>
                    <div class="absolute bottom-0 right-0 w-8 h-8 bg-cyan-800 rounded-full" style="right: -10px; bottom: -10px">
                        <div class="font-semibold text-lg flex justify-center items-center h-full">
                            <a href="route('"></a>
                            +
                        </div>

                    </div>
                </div>
                <div class="container mx-auto flex items-center justify-between py-0">
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-cyan-400 mt-8">
                        {{ $book->name }}
                    </a>

                </div>
            </div>

            @endforeach
        </div>
    </div>
@endsection
