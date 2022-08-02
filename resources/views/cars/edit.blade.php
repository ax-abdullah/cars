@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold tracking-wider">update Car</h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <input type="text" name="name" id="name" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" value="{{ $car->name }}">

                <input type="text" name="founded" id="founded" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" value="{{ $car->founded }}">

                <input type="text" name="description" id="description" class="block placeholder-gray-400  shadow-5xl mb-10 p-2 w-80 italic" value="{{ $car->description }}">

                <button type="submit" class="block shadow-5xl bg-green-500 mb-10 p-2 w-80 uppercase font-bold text-white">Submit</button>
            </div>
        </form>
    </div>
@endsection
