<?php

namespace App\Http\Controllers;

use Illuminate\Hrpp\Request;
use App\Models\Productos;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::all();

        return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductosRequest $request)
    {
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'required|string',
                'image'=>'required|image',
                'price'=>'required|numeric',
                'description'=>'nullable|string'
            ]);

            $productos=Productos::create([
                'name'=>$fields['name'],
                'image'=>$fields['image'],
                'price'=>$fields['price'],
                'descrption'=>$fields['description']
            ]);
            DB::commit();
            return response()->json($productos,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductosRequest $request, $id) 
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'string',
            'image' => 'image',
            'price' => 'numeric',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $productos)
    {
        {
            //
            try {
                DB::beginTransaction();
                $productos = Productos::find($id);
                $productos->delete();
                DB::commit();
                return response()->json($productos);
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception($exception->getMessage());
            }
        }
    }
}
