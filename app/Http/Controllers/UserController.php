<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empleado;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Not useful
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = [];
        //If the last password and this matches, then ignore the field. (Don't update the field)
        if($request['password'] == $user->password){
            $input = request()->except(['_token', '_method','tipo','password']);
        }else{
            $input = request()->except(['_token', '_method','tipo']);
        }
        $user->update($input);
        return redirect()->route('user.edit', compact('user'))->with('success_edit','open');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Just diassociate the user with the employee and then delete it.
        //Control user deleting...
        $tipo = $user->tipo;
        if($tipo == "administrador"){
            return redirect()->to('/user')->with('failedAdminDeleting', 'open');
        }else{
            //Borrar otros 
            $empleado = Empleado::where('idUser',$user->idUser)->first();
            $empleado->delete();
            $user->delete();
            return redirect()->to('/user')->with('successDeleting','open');
        }
    }
}
