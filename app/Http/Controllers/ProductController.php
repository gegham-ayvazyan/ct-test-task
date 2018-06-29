<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Product::get();
        return view('product.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->route('product.index');
        }
        $model = new Product();
        return view('product.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'quantity' => 'required|integer|max:100000',
            'price' => 'required|numeric|max:99999.99',
        ]);
        $model = new Product();
        $model->fill($request->only(['name', 'quantity', 'price']));
        $model->save();

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);

        return view('product.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $model = Product::findOrFail($id);
        $model->fill($request->only(['name', 'quantity', 'price']));
        $model->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $model = Product::findOrFail($id);
        $model->delete();
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('product.index');
    }
}
