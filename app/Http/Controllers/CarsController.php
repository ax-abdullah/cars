<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Headquarter;
use App\Models\Product;
use App\Rules\Uppercase;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        // dd($cars);
        return view('cars.index',[
            'cars'=> $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validated();
        $request->validate([
            'name'          => [new Uppercase], ['required|unique:cars'],
            'founded'       => 'required|integer|gt:1800|max:2022',
            'description'   => 'required|string',
            'image'         => 'required|mimes:jpg,jpeg,png|max:5048'
        ]);

        $imageNewName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageNewName);

        $car = Car::create([
            'name'          => $request->input('name'),
            'founded'       => $request->input('founded'),
            'description'   => $request->input('description'),
            'image_path'    => $imageNewName
        ]);
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car    = Car::find($id);
        $products = Product::find($id);
        // dd($products);
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        // $car = Car::find($id)->first();
        // $car            = Car::where('id', $id)->first();
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {
        $request->validated();
        $car            = Car::where('id', $id)->update([
            'name'          => $request->input('name'),
            'founded'       => $request->input('founded'),
            'description'   => $request->input('description')
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        // $car            = Car::where('id', $id)->delete();
        $car->delete();
        return redirect('/cars');
    }
}
