@extends('layouts.app')
@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">{{ $car->name }}</h1>
        <p class="text-lg text-gray-700 pt-6">
            {{ $car->headquarter->headquarters }}, {{ $car->headquarter->country }}
        </p>
    </div>
    <div class="py-10 text-center">
        <div class="m-auto">
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded: {{ $car->founded }}
            </span>

        <p class="text-lg text-gray-700 py-6">{{ $car->description }}</p>
        <table class="table-auto m-auto text-center">
            <tr class="bg-blue-100">
                <th class="w-1/4 p-2 border-2 border-gray-500"> Model </th>
                <th class="w-1/4 p-2 border-2 border-gray-500"> Engines </th>
                <th class="w-1/4 p-2 border-2 border-gray-500"> Producton Date</th>
            </tr>
            {{-- <tr class="bg-blue-100">
            </tr> --}}
            @forelse ($car->carModels as $model)
                <tr>
                    <td class="border-2 border-gray-500">
                        {{ $model->model_name }}
                    </td>
                    <td class="border-2 border-gray-500 p-2">
                        @foreach ($car->engines as $engine)
                            @if ($model->id == $engine->model_id)
                                {{ $engine->engine_name}}
                            @endif
                        @endforeach
                    </td>
                    <td class="border-2 border-gray-500 p-2">
                        {{ date('d-m-Y', strtotime($car->productionDate->created_at)) }}
                    </td>
                </tr>
            @empty
                No Car models found
            @endforelse
        </table>
        <hr class="mt-4 mb-8" >
    </div>
</div>
@endsection
