@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Create Car</h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                <input type="text" name="name" id="name" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" placeholder="Brand name...">

                <input type="text" name="founded" id="founded" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" placeholder="Founded...">

                <input type="text" name="description" id="description" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" placeholder="Description...">

                <button type="submit" class="block shadow-5xl bg-green-500 mb-10 p-2 w-80 uppercase font-bold text-white">Submit</button>
            </div>
        </form>
    </div>
    @if ($errors->any())
        <ul class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
