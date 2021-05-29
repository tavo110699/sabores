<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::paginate(15);

        return view('admin.user.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'direccion' => 'required',
            'tipo' => 'required',
            'active' => 'required',
        ]);
        $pass = Str::random(10);
        $request['password'] = Hash::make($pass);

        User::create($request->all());

        return redirect()->route('user.index')->with('mensaje', 'Usuario agregado con exito');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'direccion' => 'required',
            'tipo' => 'required',
        ]);
        $user = User::find($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->tipo = $request->tipo;

        if ($user->update()){
            return redirect()->route('user.index')->with('mensaje', 'Usuario actualizado con exito');

        }
        return redirect()->route('user.edit', $user->idproducto)->with('mensaje', 'No se pudo actualizar el usuario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        if ($user != null){

            if ($user->delete()) {
                return redirect()->route('user.index')->with('mensaje', 'Usuario eliminado correctamente');

            }
        }
        return redirect()->route('user.index')->with('mensaje', 'Es posible que el usuario con este Id no exista');
    }
}
