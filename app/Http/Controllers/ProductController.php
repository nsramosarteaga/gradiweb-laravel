<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre'=>'required|string|max:255',
            'descripcion'=>'required|string',
            'precio'=>'required|numeric|between:0,99999999.99',
            'foto' => 'required',
            'foto.*' => 'max:2048|mimes:jpg,jpeg,png',
          ];

        $mensaje=[
            'required' => 'El campo :attribute es requerido.',
            'numeric' => 'El campo :attribute debe ser un número',
            'foto.required' => 'Por favor cargue la foto del producto.',
            'foto.*.mimes' => 'El formato que está tratando de subir no es aceptado.',
            'foto.*.max' => 'El tamaño máximo permitido del archivo es de 2MB.',
        ];

        $this->validate($request,$campos,$mensaje);

        $form_data = $request->except('_token');

        if( $request->hasFile('foto') ){
            $name = $request->file('foto')->getClientOriginalName();
            $path =  "/images/".$name;
            $fs = Storage::disk('local')->put($path, \File::get($request->file('foto')));
        }

        $form_data['foto'] = $name;
        $form_data['created_at'] = date('Y-m-d H:i:s');
        $form_data['updated_at'] = date('Y-m-d H:i:s');

        $product = Product::create($form_data);
        return redirect()->route('products.index')->with('Mensaje','Producto creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $campos = [
            'nombre'=>'required|string|max:255',
            'descripcion'=>'required|string',
            'precio'=>'required|numeric|between:0,99999999.99',
            'foto' => 'nullable',
            'foto.*' => 'max:2048|mimes:jpg,jpeg,png',
          ];

        $mensaje=[
            'required' => 'El campo :attribute es requerido.',
            'numeric' => 'El campo :attribute debe ser un número',
            'foto.required' => 'Por favor cargue la foto del producto.',
            'foto.*.mimes' => 'El formato que está tratando de subir no es aceptado.',
            'foto.*.max' => 'El tamaño máximo permitido del archivo es de 2MB.',
        ];

        $this->validate($request,$campos,$mensaje);

        $form_data = $request->except('_token');

        if( $request->hasFile('foto') ){
            $name = $request->file('foto')->getClientOriginalName();
            $path =  "/images/".$name;
            $fs = Storage::disk('local')->put($path, \File::get($request->file('foto')));
        }

        $form_data['foto'] = (isset($name)) ? $name: $product->foto;

        $form_data['created_at'] = date('Y-m-d H:i:s');
        $form_data['updated_at'] = date('Y-m-d H:i:s');

        $product->update($form_data);

        return redirect()->route('products.show',$product->id)
                        ->with('Mensaje','Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('Mensaje','Producto eliminado exitosamente.');

    }

    public function listar()
    {
        $products = Product::paginate(6);

        return view('products.list',compact('products'));
    }
}
