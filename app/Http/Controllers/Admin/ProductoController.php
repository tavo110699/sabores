<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('idproducto', 'desc')->paginate(15);
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.crear', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'codigo' => 'required',
            'descripcion' => 'required',
            'img' => 'required|image',
            'precio' => 'required',
            'idcategoria' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $request['imagen'] = $name;
            Producto::create($request->all());
            return redirect()->route('productos.index')->with('mensaje', 'Producto agregado con exito');

        }

        return redirect()->route('productos.index')->with('mensaje', 'Ocurrio un error al agregar el producto');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::find($id)->last();
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));

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
            'nombre' => 'required|max:255',
            'codigo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'idcategoria' => 'required',
        ]);


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $request['imagen'] = $name;
        }
        $producto = Producto::find($id)->last();

        if (isset($request['imagen'])) {
            $producto->imagen = $request['imagen'];
        }
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->idcategoria = $request->idcategoria;

        if ($producto->update()){
            return redirect()->route('productos.index')->with('mensaje', 'Producto actualizado con exito');

        }
        return redirect()->route('productos.edit', $producto->idproducto)->with('mensaje', 'No se pudo actualizar el producto');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Producto::find($id)->last();

        if ($prod != null) {

            if ($prod->delete()) {
                return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado correctamente');

            }
        }
        return redirect()->route('productos.index')->with('mensaje', 'Es posible que el producto con este Id no exista');
    }
}
